<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $Tab = Setting::select('isType')->distinct()->get();
        $All = Setting::orderBy('id','asc')->get();
        return view('backend.settings.index', compact('All','Tab'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'item' => 'required',
            'isType' => 'required',
            'isImage' => 'required',
            'value' => 'nullable',
            'new_type' => 'required_if:isType,new'
        ]);

        $setting = new Setting();
        $setting->item = $request->item;
        $setting->isType = $request->isType === 'new' ? $request->new_type : $request->isType;
        $setting->isImage = $request->isImage;
        $setting->value = $request->value;
        $setting->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $All = Setting::all();
        $Edit =  Setting::where('isType', $id)->get();
        return view('backend.settings.edit', compact('Edit', 'All'));
    }


    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        
        if($setting->isImage == 1 && $request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->value = 'uploads/settings/' . $filename;
        } else {
            $setting->value = $request->value;
        }
        
        $setting->save();
        
        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
