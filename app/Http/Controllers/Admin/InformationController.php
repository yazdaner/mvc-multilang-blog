<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::latest()->paginate(20);
        return view('admin.informations.index', compact('informations'));
    }


    public function create()
    {
        $languages = Language::all();
        return view('admin.informations.create', compact('languages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'support' => 'required',
            'description' => 'required',
            'copyright' => 'required',
            'siteName' => 'required',
            'language_id' => ['required',Rule::unique('information','language_id')],
            'siteLogo' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $file = $request->file('siteLogo');
            $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' . $ext;
            $file->storeAs(env('LOGO_IMAGES_PATH'), $file_name, 'public_files');

            Information::create([
                'address' => $request->address,
                'support' => $request->support,
                'description' => $request->description,
                'copyright' => $request->copyright,
                'siteName' => $request->siteName,
                'language_id' => $request->language_id,
                'siteLogo' => $file_name
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success', 'اطلاعات مورد نظر ایجاد شد');
        return redirect()->route('admin.informations.index');
    }


    public function edit(Information $information)
    {
        $languages = Language::all();
        return view('admin.informations.edit', compact('information', 'languages'));
    }

    public function update(Request $request, Information $information)
    {
        $request->validate([
            'address' => 'required',
            'support' => 'required',
            'description' => 'required',
            'copyright' => 'required',
            'siteName' => 'required',
            'language_id' => ['required',Rule::unique('information','language_id')->ignore($information->id)],
        ]);
        try {
            DB::beginTransaction();

            $data = [

                'address' => $request->address,
                'description' => $request->description,
                'support' => $request->support,
                'copyright' => $request->copyright,
                'siteName' => $request->siteName,
                'language_id' => $request->language_id,

            ];

            if($request->hasFile('siteLogo')){
                $image = public_path(env('LOGO_IMAGES_PATH') . $information->siteLogo);
                if (File::exists($image)) {
                    File::delete($image);
                }

                $file = $request->file('siteLogo');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs(env('LOGO_IMAGES_PATH'),$file_name,'public_files');


                $data['siteLogo'] = $file_name;

            }


            $information->update($data);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success', 'اطلاعات مورد نظر ویرایش شد');
        return redirect()->route('admin.informations.index');
    }


    public function destroy(Request $request, Information $information)
    {
        $information->delete();


        try {
            DB::beginTransaction();

            $image = public_path(env('LOGO_IMAGES_PATH') . $information->siteLogo);
            if (File::exists($image)) {
                File::delete($image);
            }

            // Delete slider
            $information->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','اطلاعات مورد نظر حذف شد');
        return redirect()->route('admin.informations.index');

    }
}
