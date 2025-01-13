<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $All = ProductCategory::get()->toFlatTree();
        return view('backend.productcategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = ProductCategory::all();
        return view('backend.productcategory.create',  compact('Kategori'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $New = ProductCategory::create($request->except('_token', 'image'));


        if($request->image){
            $New->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent_id){
            $node = ProductCategory::find($request->parent_id);
            $node->appendNode($New);
        }
        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('productcategory.index');

    }


    public function show($id)
    {
        $Show = ProductCategory::findOrFail($id);
        return view('frontend.pagecategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = ProductCategory::findOrFail($id);
        $Kategori = PageCategory::all();

        return view('backend.productcategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(Request $request, ProductCategory $Update)
    {
        tap($Update)->update($request->except('_token', 'image'));

        if ($request->hasFile('image')) {
            $Update->media()->delete();
            $Update->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent){
            $node = ProductCategory::find($request);
            $node->appendNode($Update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('productcategory.index');

    }

    public function destroy($id)
    {
        $Delete = ProductCategory::find($id);
        if($Delete->getCategoryCount() > 0){
            alert()->error('Silinemez','Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('productcategory.index');
    }

    public function postUpload(Request $request)
    {

        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = seo($filename).'_'.time().'.'.$extension;
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Resim Yüklendi';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
