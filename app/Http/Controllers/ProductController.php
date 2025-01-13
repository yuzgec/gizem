<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;

class ProductController extends Controller
{

    public function index()
    {
        $All = Product::all();
        $Kategori = ProductCategory::all();
        return view('backend.product.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = ProductCategory::all();
        return view('backend.product.create',compact('Kategori'));
    }

    public function store(Request $request)
    {
        $New = Product::create($request->except('_token', 'image', 'gallery','category'));

        if($request->hasfile('image')){
            $New->addMedia($request->image)->toMediaCollection('page');
        }
        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $New->addMedia($item)->toMediaCollection('gallery');
            }
        }

        $New->save();


        if ($request->input('category')) {
            foreach ($request->input('category') as $pc) {
                ProductCategoryPivot::updateOrCreate(['category_id' => $pc, 'product_id' => $New->id]);
            }
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Edit = Product::find($id);
        $Pivot = ProductCategoryPivot::where(['product_id'=> $id])->get();

        $Kategori = ProductCategory::all();

        return view('backend.product.edit', compact('Edit', 'Kategori','Pivot'));
    }

    public function update(Request $request, Product $Update)
    {
        $Update->update($request->except('_token', '_method', 'image', 'gallery','category'));

        if ($request->removeImage == "1") {
            $Update->media()->where('collection_name', 'page')->delete();
        }

        if ($request->hasFile('image')) {
            $Update->media()->where('collection_name', 'page')->delete();
            $Update->addMedia($request->image)->toMediaCollection('page');
        }

        if ($request->hasfile('gallery')) {
            foreach ($request->gallery as $item) {
                $Update->addMedia($item)->toMediaCollection('gallery');
            }
        }


        $Update->save();

        if ($request->input('category')) {
            foreach ($request->input('category') as $pc) {
                ProductCategoryPivot::where(['product_id' => $Update->id])->delete();
            }
            foreach ($request->input('category') as $pc) {
                ProductCategoryPivot::updateOrCreate(['category_id' => $pc, 'product_id' => $Update->id]);
            }
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('product.index');
    }


    public function destroy($id)
    {
        //
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Product::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Product::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }
}
