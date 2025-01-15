<?php

namespace App\Http\Controllers;

use App\Http\Requests\serviceCategoryRequest;
use App\Models\servicecategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceCategoryController extends Controller
{

    public function index()
    {
        $All = ServiceCategory::get()->toFlatTree();
        return view('backend.servicecategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = ServiceCategory::all();
        return view('backend.servicecategory.create', compact('Kategori'));
    }

    public function store(Request $request)
    {
        $create = ServiceCategory::create($request->except('_token', 'image'));

        $this->mediaService->handleMediaUpload(
            $create, 
            $request->file('image'),
            'page',
            false
        );

        if ($request->parent_id) {
            $node = ServiceCategory::find($request->parent_id);
            $node->appendNode($create);
        }

        toast(SWEETALERT_MESSAGE_CREATE, 'success');
        return redirect()->route('servicecategory.index');

    }


    public function show($id)
    {
        $Show = ServiceCategory::findOrFail($id);
        return view('frontend.servicecategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = ServiceCategory::findOrFail($id);
        $Kategori = ServiceCategory::all();

        return view('backend.servicecategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(Request $request, ServiceCategory $update)
    {
        tap($update)->update($request->except('_token', 'image'));

         $this->mediaService->updateMedia(
            $update, 
            $request->file('image'),
            'page',
            false
        );


        if ($request->parent) {
            $node = ServiceCategory::find($request);
            $node->appendNode($update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE, 'success');
        return redirect()->route('servicecategory.index');

    }

    public function destroy($id)
    {
        $Delete = ServiceCategory::find($id);
        if ($Delete->getCategoryCount() > 0) {
            alert()->error('Silinemez', 'Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE, 'success');
        return redirect()->route('servicecategory.index');
    }
}
