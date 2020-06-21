<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InventoryManagement;
use App\Models\Item;
use App\Models\ItemLog;
use App\Models\ItemSubtitle;
use App\Models\Manufacture;
use App\Models\MotherCategory;
use App\Models\Project;
use App\Models\PurchaseItem;
use App\Models\RequestItem;
use App\Models\SubCategory;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InventoryManagementController extends Controller
{
    public function showInventory()
    {
        $motherCategory = MotherCategory::all();

        $category = Category::all();

        $subCategory = SubCategory::all();

        $manufacture = Manufacture::all();

        return view('admin.item.add-item')->with([
            'motherCategory' => $motherCategory,
            'category' => $category,
            'subCategory' => $subCategory,
            'manufacture' => $manufacture
        ]);
    }
    public function processInventory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mother_category_id'        => ['required'],
            'item_name'              => ['required', 'string'],
            'item_unit'        => ['required', 'string'],
            'item_price'          => ['required'],
            'item_reusable'          => ['required']
        ]);

        if ($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }


        $itemImg = $request->file('item_image');
        if ($itemImg != null)
        {
            $rename = date('YmdHis') . '-' . time() . '-' . $itemImg->getClientOriginalName();
            $dir = './images/items/';
            $itemImg->move($dir,$rename);
            $itemImg = $dir.$rename;
        }

        $createItem = new InventoryManagement();

        $createItem->mother_category_id = $request->post('mother_category_id');
        $createItem->category_id = $request->post('category_id');
        $createItem->sub_category_id = $request->post('sub_category_id');
        $createItem->manufacture_id = $request->post('manufacture_id');
        $createItem->item_name = $request->post('item_name');
        $createItem->item_unit = $request->post('item_unit');
        $createItem->item_price = $request->post('item_price');
        $createItem->item_reusable = $request->post('item_reusable');
        $createItem->item_description = $request->post('item_description');
        $createItem->item_type = $request->post('item_type');
        $createItem->item_image = $itemImg;

        $createItem->save();


        if ($request->subtitle_name){
            foreach ($request->subtitle_name as $index => $sn){
                ItemSubtitle::create([
                    'inventory_management_id' => $createItem->id,
                    'name' => $request->subtitle_name[$index],
                    'price' => $request->subtitle_price[$index],
                ]);
            }
        }

        return redirectBackWithNotification('success', 'Item Create Successfully!');

//        return redirect()->back()->with('message','Item Create Successfully');
    }


    public function selectCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'categories' => Category::where('mother_category_id', $id)->get()
            ]);
        }
    }

    public function selectSubCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'subCategories' => SubCategory::where('category_id', $id)->get()
            ]);
        }
    }

    public function selectItemSubCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'item' => InventoryManagement::where('sub_category_id', $id)->get()
            ]);
        }
    }

    public function selectItemCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'item' => InventoryManagement::where('category_id', $id)->get()
            ]);
        }
    }

    public function selectItemMotherCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'item' => InventoryManagement::where('mother_category_id', $id)->get()
            ]);
        }
    }

    public function selectItemSubtitle(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'item_subtitle' => ItemSubtitle::where('inventory_management_id', $id)->get()
            ]);
        }
    }

    public function showAllInventory(Request $request){

        $inventory = InventoryManagement::orderBy('created_at','DESC')->get();

        if(Auth::user()->isAdmin() || Auth::user()->isAccountant()) {
            $project  = Project::where('project_status', '=', 'active')->get();
        }
        else {
            $project = Auth::user()->projects()
                ->where('project_status', '=', 'active')
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        return view('admin.item.all-item-list')->with([
            'inventory' => $inventory,
            'project'   => $project
        ]);
    }

    public function edit($id) {

        $inventory = InventoryManagement::findOrFail($id);

        $motherCategory = MotherCategory::all();

        $manufacture = Manufacture::all();

        return view('admin.item.edit-item')
            ->with([
                'inventory' => $inventory,
                'motherCategory' => $motherCategory,
                'manufacture' => $manufacture
            ]);
    }

    public function updateInventory(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'mother_category_id'        => ['required'],
            'item_name'                 => ['required', 'string'],
            'item_unit'                 => ['required', 'string'],
            'item_price'                => ['required'],
            'item_reusable'             => ['required']
        ]);

        if ($validator->fails()) {
            return redirectBackWithValidationError($validator);
        }

        $inventory = InventoryManagement::findOrFail($id);

        $itemImg = $request->file('item_image');
        if ($itemImg != null)
        {
            $rename = date('YmdHis') . '-' . time() . '-' . $itemImg->getClientOriginalName();
            $dir = './images/items/';
            $itemImg->move($dir,$rename);
            $itemImg = $dir.$rename;
        }

        $inventory->mother_category_id = $request->post('mother_category_id');
        $inventory->category_id = $request->post('category_id');
        $inventory->sub_category_id = $request->post('sub_category_id');
        $inventory->manufacture_id = $request->post('manufacture_id');
        $inventory->item_name = $request->post('item_name');
        $inventory->item_unit = $request->post('item_unit');
        $inventory->item_price = $request->post('item_price');
        $inventory->item_reusable = $request->post('item_reusable');
        $inventory->item_image = $itemImg;

        $inventory->save();

        return redirectBackWithNotification('success', 'Item Updated Successfully!');

//        return redirect()->back()->with('message','Item Updated Successfully');

    }


    public function delete(Request $request, $id){

        $inventory=InventoryManagement::findOrFail($id);

        $image_path = $inventory->item_image;

        if (file_exists($image_path)) {

            unlink($image_path);

        }

        try {
            $inventory->delete();
            return redirectBackWithNotification('success', 'Item Deleted Successfully!');
        }
        catch (\Exception $exception) {
            return redirectBackWithException($exception);
        }

//        return redirect()->back()->with('message','Item Deleted successfully');
    }


    public function showItemsDetails($id) {

        $item = InventoryManagement::find($id);

//        dd($item);

        $itemList = PurchaseItem::where('item_id', '=', $item->id)
                    ->select(
                        DB::raw('
                           item_id,
                           project_id,
                           user_id,
                           price,
                           vat,
                           SUM(quantity) as quantity,
                           SUM(amount) as amount,
                           SUM(price) as price,
                           MAX(created_at) AS created_at,
                           MAX(id) AS id
                        '))
                        ->groupBy('project_id')
                        ->get();

        $totalSumQuantity = PurchaseItem::where('item_id','=',$item->id)->sum('quantity');
        $totalSumPrice = PurchaseItem::where('item_id','=',$item->id)->sum('price');
        $totalSumAmount = PurchaseItem::where('item_id','=',$item->id)->sum('amount');

        $allItemList = PurchaseItem::where('item_id', '=', $item->id)->orderBy('created_at', 'desc')->get();

        return view('admin.item.item-details')
            ->with([
                'item'              => $item,
                'totalSumQuantity'          => $totalSumQuantity,
                'totalSumPrice'          => $totalSumPrice,
                'totalSumAmount'          => $totalSumAmount,
                'itemList'          => $itemList,
                'allItemList'       => $allItemList,
            ]);
    }


    // Item See by Project
}
