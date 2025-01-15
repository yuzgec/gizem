<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Redirect;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $All = BlogCategory::get()->toFlatTree();
        return view('backend.blogcategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = BlogCategory::all();
        return view('backend.blogcategory.create', compact('Kategori'));
    }

    public function store(BlogCategoryRequest $request)
    {
        $create = ServiceCategory::create($request->except('_token', 'image'));

        $this->mediaService->handleMediaUpload(
            $create, 
            $request->file('image'),
            'page',
            false
        );

        if ($request->parent_id) {
            $node = BlogCategory::find($request->parent_id);
            $node->appendNode($create);
        }

        toast(SWEETALERT_MESSAGE_CREATE, 'success');
        return redirect()->route('blogcategory.index');

    }

    public function show($id)
    {
        $Show = BlogCategory::findOrFail($id);
        return view('frontend.blogcategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = BlogCategory::findOrFail($id);
        $Kategori = BlogCategory::all();

        return view('backend.blogcategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(BlogCategoryRequest $request, BlogCategory $update)
    {
        tap($update)->update($request->except('_token', 'image'));

         $this->mediaService->updateMedia(
            $update, 
            $request->file('image'),
            'page',
            false
        );

        if ($request->parent) {
            $node = BlogCategory::find($request);
            $node->appendNode($update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE, 'success');
        return redirect()->route('blogcategory.index');

    }

    public function destroy($id)
    {
        $Delete = BlogCategory::find($id);
        if ($Delete->getCategoryCount() > 0) {
            alert()->error('Silinemez', 'Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE, 'success');
        return redirect()->route('blogcategory.index');
    }
}
