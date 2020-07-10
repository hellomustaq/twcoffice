<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Category;
use App\Models\InventoryManagement;
use App\Models\Item;
use App\Models\Manufacture;
use App\Models\MotherCategory;
use App\Models\Project;
use App\Models\RequestItem;
use App\Models\Settings;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mpdf\Tag\Input;

class RequestItemController extends Controller
{
    public function showRequest()
    {
        $motherCategory = MotherCategory::all();

        $manufacture  = Manufacture::all();

        if(Auth::user()->isAdmin() || Auth::user()->isAccountant()) {
            $project  = Project::where('project_status', '=', 'active')->get();
        }
        else {
            $project = Auth::user()->projects()
                ->where('project_status', '=', 'active')
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        $itemList = RequestItem::all();

        return view('admin.item.request.request-item')->with([
            'motherCategory' => $motherCategory,
            'manufacture'  => $manufacture,
            'project'  => $project,
            'itemList' => $itemList
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function processRequest(Request $request): RedirectResponse
    {
        $add = Cart::add([
            'id' => $request->item_id,
            'name' => 'name',
            'qty' => $request->quantity,
            'price' => $request->price,
            'weight' => '1',
            'options' => [
                'mother_category_id' => $request->mother_category_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'manufacture_id' => $request->manufacture_id,
                'request_date' => $request->request_date,
                'request_code' => $request->request_code,
                'request_id' => $request->request_id,
                'project_id' => $request->project_id,
                'item_id' => $request->item_id,
                'price' => $request->price,
                'vat' => $request->vat,
                'quantity' => $request->quantity,
                'amount' => $request->amount,
                'item_type' => $request->item_type,
                'item_description' => $request->item_description,
                'item_subtitle' => $request->item_subtitle
            ]
        ])->associate(RequestItem::class);

        return redirect()->back()->with('message','Item added successfully');

    }

    public function processCartRequest(Request $request) {
        $request->validate([
            'addmore.*.item_id' => 'required',
            'addmore.*.price' => 'required',
            'addmore.*.quantity' => 'required',
            'addmore.*.amount' => 'required',
            'addmore.*.mother_category_id' => 'required',
            'addmore.*.project_id' => 'required',
        ]);


        foreach ($request->addmore as $key => $value) {
            RequestItem::create($value);
        }

        Cart::destroy();

        return redirect()->route('request-inventory')
            ->with('message','Request has been send successfully');

    }


    public function showRequestList(){

        $itemList = RequestItem::select(
            DB::raw('
                           cartId,
                           request_id,
                           project_id,
                           status_req,
                           MAX(created_at) AS created_at,
                           MAX(id) AS id
            '))
            ->groupBy('cartId')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.item.request.request-list')->with([
            'itemList' => $itemList
        ]);
    }

    public function showRequestListManager(){

        $currentUser = Auth::user()->id;

        $itemList = RequestItem::where('request_id','=',$currentUser)->get();

        return view('admin.item.request.request-list-manager')->with([
            'itemList' => $itemList
        ]);
    }

    public function showRequestItemList(Request $request, $cartId){

        $cartValue = $cartId;

        $itemList = RequestItem::with('subtitle')->where('cartId','=',$cartValue)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.item.request.request-item-list')->with([
            'itemList' => $itemList
        ]);
    }

    /* public function delete(Request $request, $id){

        $itemList=RequestItem::find($id);

        $itemList->delete();

        return redirect()->back()->with('message','Item Deleted successfully');
    } */

    public function delete(Request $request){
        Cart::remove($request->rowId);
        return [
            'success' => true,
            'message' => 'Delete Successful !!'
        ];
    }


    public function edit($id) {

        $inventory = RequestItem::findOrFail($id);

        return view('admin.item.request.edit-request-item')
            ->with([
                'inventory' => $inventory,
            ]);
    }

    public function updateInventory(Request $request, $id) {

        $validator =Validator::make($request->all(), [
            'item_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'amount' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $inventoryRequest = RequestItem::findOrFail($id);

        $inventoryRequest->mother_category_id = $request->post('mother_category_id');
        $inventoryRequest->category_id = $request->post('category_id');
        $inventoryRequest->sub_category_id = $request->post('sub_category_id');
        $inventoryRequest->manufacture_id = $request->post('manufacture_id');
        $inventoryRequest->item_id = $request->post('item_id');
        $inventoryRequest->price = $request->post('price');
        $inventoryRequest->vat = $request->post('vat');
        $inventoryRequest->quantity = $request->post('quantity');
        $inventoryRequest->amount = $request->post('amount');
        $inventoryRequest->project_id = $request->post('project_id');
        $inventoryRequest->request_date = $request->post('request_date');
        $inventoryRequest->request_code = $request->post('request_code');
        $inventoryRequest->request_id = $request->post('request_id');
        $inventoryRequest->cartId = $request->post('cartId');
        $inventoryRequest->status_req = $request->post('status_req');


        $inventoryRequest->save();

        return redirect()
            ->route('request-item-list', ['id' => $inventoryRequest->cartId] )
            ->with('message','Requested Item Updated Successfully');

    }


    public function deleteRequest(Request $request, $id){

        $inventory=RequestItem::findOrFail($id);

        $inventory->delete();

        return redirect()->back()->with('message','Request Item Deleted Successfully');
    }


    public function chnageApproveStatus(Request $request)
    {
        $labor = RequestItem::find($request->user_id);
        $labor->status_req = $request->status_req;
        $labor->save();

        return response()->json(['message' => 'Item status has been changed']);
    }
}
