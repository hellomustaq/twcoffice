<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BankController extends Controller
{
    public function index() {
        $this->checkPermission();
        $banks = BankAccount::all();
        $clients = Role::whereRoleSlug('client')
            ->firstOrFail()
            ->users;

        $projects = Project::whereProjectStatus('active')->get();

        $adminBanks = BankAccount::where('bank_user_id', '=', null)->get();

        $roles = Role::whereIn('role_slug', ['administrator', 'accountant'])
            ->pluck('role_id')
            ->toArray();

        $cash = 0;
//        $payments = Payment::wherePaymentBy('cash')->get();

        // Optimize page loading time
        $payments = Payment::wherePaymentBy('cash')
            ->whereHas('activity.activityBy', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })->get();
        /*->filter(function ($payment) {
            return in_array($payment->activity->activityBy->id, $roles)
        });*/

        // Do not use in_array for $roles and role_id
        foreach ($payments as $index => $payment) {
                if(in_array(strtolower($payment->payment_purpose), ['employee_transfer', 'employee_refund', 'vendor_payment', 'vendor_refund', 'loan_payment', 'salary', 'office_deposit'])) {
                    $cash -= $payment->payment_amount;
                }
                else {
                    $cash += $payment->payment_amount;
                }
            }

        return view('admin.accounting.banks.index')
            ->with([
                'adminBanks'    => $adminBanks,
                'banks'         => $banks,
                'clients'       => $clients,
                'projects'      => $projects,
                'cash'          => $cash
            ]);
    }

    public function bankDetails($id) {
        if(!Auth::user()->isAdmin() && !Auth::user()->isAccountant()) {
            return redirectBackWithNotification('error', 'You are not authorised!');
        }

        if($id == 'cash') {
//            $projects = Project::select(['bsoft_projects.project_id', 'bsoft_projects.project_name'])->get();

            $roles = Role::whereIn('role_slug', ['administrator', 'accountant'])
                ->pluck('role_id')
                ->toArray();

            $payments = Payment::where('payment_by','=','cash')
                ->whereHas('activity.activityBy', function ($query) use ($roles) {
                    $query->whereIn('role_id', $roles);
                })
                ->orderBy('payment_date', 'desc')
                ->get();

//            dd($payments);

            $paymentsloanacash = Payment::where('payment_by','=','cash')
                ->whereIn('payment_purpose', ['loan_received', 'loan_payment'])
                ->orderByDesc('payment_date')
                ->whereHas('activity.activityBy', function ($query) use ($roles) {
                    $query->whereIn('role_id', $roles);
                })->get();

            return view('admin.accounting.banks.show')
                ->with([
//                    'projects'   => $projects
                    'payments' => $payments,
                    'paymentsloanacash' => $paymentsloanacash
                ]);
        }

        $bank = BankAccount::findOrFail($id);

        if(!$bank->user) {
            $payments = Payment::where('payment_from_bank_account', '=', $bank->bank_id)
                ->orWhere('payment_to_bank_account', '=', $bank->bank_id)
                ->get();
            $balance = $bank->bank_balance;
        }
        else {
            $payments = Payment::where('payment_from_bank_account', '=', $bank->bank_id)
                ->orWhere('payment_to_bank_account', '=', $bank->bank_id)
                ->orWhere('payment_to_user', '=', $bank->user->id)
                ->orWhere('payment_from_user', '=', $bank->user->id)
                ->get();
            $balance = 0;
            $exp = 0;
            $inc = 0;
            foreach ($payments as $payment) {
                if($payment->payment_from_user == $bank->user->id) {
                    $exp += $payment->payment_amount;
                }
                elseif ($payment->payment_to_user == $bank->user->id) {
                    $inc += $payment->payment_amount;
                }
            }
            $balance = $inc - $exp;
        }

        return view('admin.accounting.banks.show')
            ->with([
                'bank'       => $bank,
                'payments'   => $payments,
                'balance'    => $balance
            ]);
    }

    public function rechargeFromCustomer(Request $request) {
        $this->checkPermission();

        $validator = Validator::make($request->all(), [
            'user_id'   => ['required', 'numeric'],
            'bank_id'   => ['nullable', 'numeric'],
            'project_id'   => ['required', 'numeric'],
            'type'      => ['required', 'string'],
            'amount'    => ['required', 'numeric'],
            'date'      => ['required', 'date'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }
        $payment = createNewPayment([
            'type' => 'credit',
            'to_user' => null,
            'from_user' => $request->post('user_id'),
            'to_bank_account' => (strtolower($request->post('type')) === 'bank' || strtolower($request->post('type')) === 'check')
                ? $request->post('bank_id') : null,
            'from_bank_account' => null,
            'amount' => $request->post('amount'),
            'project' => $request->post('project_id'),
            'purpose' => 'project_money',
            'by' => $request->post('type'),
            'date' => $request->post('date'),
            'image' => null,
            'note'  => $request->post('note')
        ]);
        if(!$payment) {
            return redirectBackWithNotification();
        }
        if(strtolower($request->post('type')) === 'bank' || $request->post('type') == 'check') {
            $offBank = BankAccount::findOrFail($request->post('bank_id'));
            $offBank->bank_balance = $offBank->bank_balance + (float) $request->post('amount');
            $offBank->save();
        }
        return redirectBackWithNotification('success', 'Client Money Successfully Received!');
    }

    public function storeAccount(Request $request) {
        $this->checkPermission();

        $validator = Validator::make($request->all(), [
            'user_id'           => ['nullable', 'numeric'],
            'name'              => ['required', 'string'],
            'number'            => ['required', 'string'],
            'bank'              => ['required', 'string'],
            'branch'            => ['required', 'string'],
            'balance'           => ['required', 'numeric'],
            'accountFor'        => ['required', 'string'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }

        $bank = new BankAccount();

        $bank->bank_user_id = ($request->post('user_id')) ? $request->post('user_id') : null;
        $bank->bank_account_name = $request->post('name');
        $bank->bank_account_no = $request->post('number');
        $bank->bank_name = $request->post('bank');
        $bank->bank_branch = $request->post('branch');
        $bank->bank_balance = $request->post('balance');

        if(!$bank->save()) {
            return redirectBackWithNotification();
        }
        addActivity('bank', $bank->bank_id, 'Bank Account Added');

        return redirectBackWithNotification('success', 'Bank Account Successfully Added!');
    }

    public function transferToEmployee(Request $request) {
        $this->checkPermission();
        $validator = Validator::make($request->all(), [
            'employee_id'       => ['required', 'string'],
            'bank_id'           => ['nullable', 'numeric'],
            'project_id'        => ['required', 'numeric'],
            'type'              => ['required', 'string'],
            'amount'            => ['required', 'numeric'],
            'date'              => ['required', 'date'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }
        if(strtolower($request->post('type')) !== 'cash' && $request->post('bank_id') === null) {
            return redirectBackWithNotification('error', 'Bank Account must be selected!');
        }
        $employee_id = $request->post('employee_id');
        $employee_bank_id = null;

        if(strpos($request->post('employee_id'), '@') !== false) {
            $employee_id = Str::before($request->post('employee_id'), '@');
            $employee_bank_id = Str::after($request->post('employee_id'), '@');
        }


        $paymentData = [
            'type' => null,
            'to_user' => $employee_id,
            'from_user' => Auth::id(),
            'to_bank_account' => $employee_bank_id,
            'from_bank_account' => (strtolower($request->post('type')) !== 'cash') ? $request->post('bank_id') : null,
            'amount' => $request->post('amount'),
            'project' => $request->post('project_id'),
            'purpose' => 'employee_transfer',
            'by' => strtolower($request->post('type')),
            'date' => $request->post('date'),
            'image' => null,
            'note' =>$request->post('note')
        ];

        if(!createNewPayment($paymentData)) {
            return redirectBackWithNotification();
        }
        if(strtolower($request->post('type')) === 'bank' || $request->post('payment_by') == 'check') {
            $officeBank = BankAccount::findOrFail($request->post('bank_id'));
            $officeBank->bank_balance = $officeBank->bank_balance - (float) $request->post('amount');
            $officeBank->save();

            $employeeBank = BankAccount::findOrFail($employee_bank_id);
            $employeeBank->bank_balance = $employeeBank->bank_balance + (float) $request->post('amount');
            $employeeBank->save();
        }

        return redirectBackWithNotification('success', 'Transfer successfully made!');
    }

    public function transferToOffice(Request $request) {
        $this->checkPermission();
        $validator = Validator::make($request->all(), [
            'employee_id'       => ['required', 'string'],
            'bank_id'           => ['nullable', 'numeric'],
            'project_id'        => ['required', 'numeric'],
            'type'              => ['required', 'string'],
            'amount'            => ['required', 'numeric'],
            'date'              => ['required', 'date'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }
        if(strtolower($request->post('type')) !== 'bank' && $request->post('bank_id') === null) {
            return redirectBackWithNotification('error', 'Bank Account must be selected!');
        }
        $employee_id = $request->post('employee_id');
        $employee_bank_id = null;

        if(strpos($request->post('employee_id'), '@') !== false) {
            $employee_id = Str::before($request->post('employee_id'), '@');
            $employee_bank_id = Str::after($request->post('employee_id'), '@');
        }
        else {
            $employee_bank_id = $this->createAutoGeneratedAccount($employee_id)->bank_id;
        }
        $paymentData = [
            'type' => null,
            'to_user' => $employee_id,
            'from_user' => Auth::id(),
            'to_bank_account' => $employee_bank_id,
            'from_bank_account' => (strtolower($request->post('type')) === 'bank') ? $request->post('bank_id') : null,
            'amount' => $request->post('amount') - ($request->post('amount') * 2),
            'project' => $request->post('project_id'),
            'purpose' => 'employee_refund',
            'by' => strtolower($request->post('type')),
            'date' => $request->post('date'),
            'image' => null,
            'note' =>$request->post('note')
        ];

        if(!createNewPayment($paymentData)) {
            return redirectBackWithNotification();
        }
        if(strtolower($request->post('type')) === 'bank' || $request->post('payment_by') == 'check') {
            $officeBank = BankAccount::findOrFail($request->post('bank_id'));
            $officeBank->bank_balance = $officeBank->bank_balance + (float) $request->post('amount');
            $officeBank->save();
        }
        $employeeBank = BankAccount::findOrFail($employee_bank_id);
        $employeeBank->bank_balance = $employeeBank->bank_balance - (float) $request->post('amount');
        $employeeBank->save();

        return redirectBackWithNotification('success', 'Money successfully refunded!');
    }

    public function withdrawFromBank(Request $request) {
        $this->checkPermission();
        $validator = Validator::make($request->all(), [
            'bank_id'           => ['nullable', 'numeric'],
            'amount'            => ['required', 'numeric'],
            'date'              => ['required', 'date'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }
        $paymentData = [
            'type' => null,
            'to_user' => null,
            'from_user' => null,
            'to_bank_account' => null,
            'from_bank_account' => $request->post('bank_id'),
            'amount' => $request->post('amount'),
            'project' => null,
            'purpose' => 'office_withdraw',
            'by' => 'cash',
            'date' => $request->post('date'),
            'image' => null,
            'note' =>$request->post('note')
        ];

        if(!createNewPayment($paymentData)) {
            return redirectBackWithNotification();
        }

        $officeBank = BankAccount::findOrFail($request->post('bank_id'));
        $officeBank->bank_balance = $officeBank->bank_balance - (float) $request->post('amount');
        $officeBank->save();
        return redirectBackWithNotification('success', 'Money successfully Withdrawn!');
    }

    public function depositToBank(Request $request) {
        $this->checkPermission();
        $validator = Validator::make($request->all(), [
            'bank_id'           => ['nullable', 'numeric'],
            'amount'            => ['required', 'numeric'],
            'date'              => ['required', 'date'],
        ]);
        if($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }
        $paymentData = [
            'type' => null,
            'to_user' => null,
            'from_user' => null,
            'to_bank_account' => $request->post('bank_id'),
            'from_bank_account' => null,
            'amount' => $request->post('amount'),
            'project' => null,
            'purpose' => 'office_deposit',
            'by' => 'cash',
            'date' => $request->post('date'),
            'image' => null,
            'note' =>$request->post('note')
        ];

        if(!createNewPayment($paymentData)) {
            return redirectBackWithNotification();
        }

        $officeBank = BankAccount::findOrFail($request->post('bank_id'));
        $officeBank->bank_balance = $officeBank->bank_balance + (float) $request->post('amount');
        $officeBank->save();
        return redirectBackWithNotification('success', 'Money successfully Deposited!');
    }

    public function income() {
        $this->checkPermission();
//        $projects = Project::select(['bsoft_projects.project_id', 'bsoft_projects.project_name'])->get();

        $role_id = Role::whereRoleSlug('accountant')->firstOrFail()->role_id;

        $payments = Payment::where('payment_type','=','credit')
            ->orderBy('payment_date', 'desc')
            ->get();

        $paymentsloan = Payment::wherePaymentType('credit')
            ->where('payment_purpose', '=', 'loan_received')
            ->orderBy('payment_date', 'desc')
            ->get();

        return view('admin.accounting.income')
            ->with([
                'payments'  => $payments,
                'paymentsloan' => $paymentsloan
            ]);
    }

    public function expense() {
        $this->checkPermission();
//        $projects = Project::select(['bsoft_projects.project_id', 'bsoft_projects.project_name'])->get();

        $roles = Role::whereIn('role_slug', ['administrator', 'accountant'])
            ->pluck('role_id')
            ->toArray();

        $payments = Payment::where('payment_type','=','debit')
            ->whereHas('activity.activityBy', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })->orderBy('payment_date', 'desc')
            ->get();

        $paymentsExpense = Payment::wherePaymentType('debit')
            ->where('payment_purpose', '=', 'loan_payment')
            ->orderBy('payment_date', 'desc')
            ->get();

        return view('admin.accounting.expense')
            ->with([
                'payments'     => $payments,
                'paymentsExpense' => $paymentsExpense
            ]);
    }

    public function getUsers(Request $request) {
        $this->checkPermission();
        $users = Role::whereRoleSlug($request->post('type'))->firstOrFail()
            ->users;

        return view('admin.accounting.banks.ajax-users')
            ->with([
                'users' => $users
            ]);
    }

    public function getClientProjects(Request $request) {
        $this->checkPermission();
        $projects = User::findOrFail($request->post('client_id'))->clientProjects()
            ->where('project_status', '=', 'active')->get();

        return view('admin.accounting.banks.ajax-projects')
            ->with([
                'projects' => $projects
            ]);
    }

    public function getManagers(Request $request) {
        $this->checkPermission();

        $roles = Role::whereIn('role_slug', ['manager'])
            ->pluck('role_id')
            ->toArray();

        $users = Project::findOrFail($request->post('project_id'))->employees()
            ->whereIn('role_id', $roles)
            ->get();

        return view('admin.accounting.banks.ajax-employees')
            ->with([
                'users'  => $users
            ]);
    }

    /**
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    protected function checkPermission() {
        $role = Auth::user()->role->role_slug;

        if($role == 'administrator' || $role == 'accountant') {
            return true;
        }
        return redirectBackWithNotification('error', 'Sorry! You Are Not Authorised!.');
    }

    protected function createAutoGeneratedAccount(int $id) {
        $employee = User::findOrFail($id);
        $bank = new BankAccount();

        $bank->bank_account_name = 'Auto Generated Bank Account!';
        $bank->bank_user_id = $employee->id;
        $bank->save();

        return $bank;
    }

    public function incomeReport(Request $request) {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = DB::table('bsoft_payments')
                    ->whereBetween('payment_date', array($request->from_date, $request->to_date))
                    ->where('payment_by','=','cash')
                    ->join('bsoft_activities', 'bsoft_payments.payment_id', '=', 'bsoft_activities.activity_payment_id')
                    ->join('bsoft_users as activity', 'bsoft_activities.activity_of_user_id', '=', 'activity.id')
                    ->join('bsoft_users as toUser', 'bsoft_payments.payment_to_user', '=', 'toUser.id')
                    ->join('bsoft_users as fromUser', 'bsoft_payments.payment_from_user', '=', 'fromUser.id')
                    ->join('bsoft_projects', 'bsoft_payments.payment_for_project', '=', 'bsoft_projects.project_id')
                    ->select('bsoft_payments.*', 'bsoft_projects.project_name', 'bsoft_projects.project_id',
                        'fromUser.name as fromUser_name', 'toUser.name as toUser_name',
                        'activity.name as activityUser_name')
                    ->get();
            }
            else
            {
                $data = DB::table('bsoft_payments')
                    ->where('payment_by','=','cash')
                    ->join('bsoft_activities', 'bsoft_payments.payment_id', '=', 'bsoft_activities.activity_payment_id')
                    ->join('bsoft_users as activity', 'bsoft_activities.activity_of_user_id', '=', 'activity.id')
                    ->join('bsoft_users as toUser', 'bsoft_payments.payment_to_user', '=', 'toUser.id')
                    ->join('bsoft_users as fromUser', 'bsoft_payments.payment_from_user', '=', 'fromUser.id')
                    ->join('bsoft_projects', 'bsoft_payments.payment_for_project', '=', 'bsoft_projects.project_id')
                    ->select('bsoft_payments.*', 'bsoft_projects.project_name', 'bsoft_projects.project_id',
                        'fromUser.name as fromUser_name', 'toUser.name as toUser_name',
                        'activity.name as activityUser_name')
                    ->get();
            }
            return datatables()->of($data)->make(true);
        }
        return view('admin.accounting.income-report');
    }

    public function transferToEmployeeTable(){

        $this->checkPermission();

        $paymentToEmployee = Payment::where('payment_purpose','=','employee_transfer')
            ->get();

        return view('admin.accounting.bankPurposeTable.transfer-to-employee')
            ->with([
                'paymentToEmployee'  => $paymentToEmployee,
            ]);
    }

    public function refundFromEmployeeTable(){

        $this->checkPermission();

        $paymentFromEmployee = Payment::where('payment_purpose','=','employee_refund')
            ->get();

        return view('admin.accounting.bankPurposeTable.refund-from-employee')
            ->with([
                'paymentFromEmployee'  => $paymentFromEmployee,
            ]);
    }

}
