<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $All = Service::with('getCategory')->orderBy('rank')->get();
        $Kategori = ServiceCategory::all();

        return view('backend.service.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = ServiceCategory::all();
        return view('backend.service.create',compact('Kategori'));
    }

    public function store(Request $request)
    {
        $create = Service::create($request->except('_token', 'image', 'gallery'));


        $this->mediaService->handleMediaUpload(
            $create, 
            $request->file('image'),
            'page',
            false
        );

        $this->mediaService->handleMediaUpload(
            $create, 
            $request->file('cover'),
            'cover',
            false
        );

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');
            
            $this->mediaService->handleMultipleMediaUpload(
                $create,
                $files,
                'gallery',
            );
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('service.index');
    }

    public function show($id)
    {
        $Show = Service::findOrFail($id);
        return view('frontend.service.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = Service::findOrFail($id);
        $Kategori = ServiceCategory::all();
        return view('backend.service.edit', compact('Edit', 'Kategori'));
    }

    public function update(Request $request, Service $update)
    {
        $update->update($request->except('_token', '_method', 'image', 'gallery'));

        $this->mediaService->updateMedia(
            $update, 
            $request->file('image'),
            'page',
            false
        );

        $this->mediaService->updateMedia(
            $update, 
            $request->file('cover'),
            'cover',
            false
        );

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');
            
            $this->mediaService->handleMultipleMediaUpload(
                $update,
                $files,
                'gallery',
                false
            );

        }
        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('service.index');

    }

    public function destroy($id)
    {
        $Delete = Service::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('service.index');
    }

    public function getTrash(){
        $Trash = Service::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.service.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Service::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Service::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }

    public function deleteGaleriDelete($id){

        $Delete = Service::find($id);
        $Delete->media()->where('id', \request('image_id'))->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('service.edit', $id);

    }
}
