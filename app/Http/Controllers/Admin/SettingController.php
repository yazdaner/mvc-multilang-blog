<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.index',compact('settings'));
    }


    public function store(Request $request)
    {
        Setting::create([


            'telephone' => $request->telephone,
            'telephone2' => $request->telephone2,

            'longitude' => $request->longitude,
            'latitude' => $request->latitude,

            'email' => $request->email,
            'email2' => $request->email2,

            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'github' => $request->github,



        ]);
        $request->session()->flash('success','تنظیمات با موفقیت اعمال شد');
        return redirect()->route('admin.settings.index');
    }



    public function update(Request $request, Setting $setting)
    {

        $setting->update([
            'telephone' => $request->telephone,
            'telephone2' => $request->telephone2,

            'longitude' => $request->longitude,
            'latitude' => $request->latitude,

            'email' => $request->email,
            'email2' => $request->email2,

            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'github' => $request->github,
        ]);
        $request->session()->flash('success','تنظیمات با موفقیت اعمال شد');
        return redirect()->route('admin.settings.index');
    }


}
