<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{

    function index()
    {
        return view('admin/setting/index');
    }

    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'website_name'=>'required|max:255',
            'logo'=>'nullable',
            'favicon'=>'nullable',
            'description'=>'nullable',
            'meta_title'=>'required|max:255',
            'meta_keyword'=>'nullable',
            'meta_description'=>'nullable'
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->with('message','Fill the missing fields');
        }
        $settingCheck=Setting::where('id','1')->first();
        if($settingCheck)
        {

        }
        else
        {
            $setting=new Setting;
            $setting->website_name=$req->website_name;
            if($req->hasFile('logo'))
            {
                $file=$req->file('logo');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->logo=$filename;
            }
            if($req->hasFile('favicon'))
            {
                $file=$req->file('favicon');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/settings/favicon',$filename);
                $setting->favicon=$filename;
            }

            $setting->description=$req->description;
            $setting->meta_title=$req->meta_title;
            $setting->meta_keyword=$req->meta_keyword;
            $setting->meta_description=$req->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message',"Setting saved successfully!");
        }
    }

}
