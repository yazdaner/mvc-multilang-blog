<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{

    public function index()
    {
        $aboutUs = AboutUs::latest()->paginate(20);
        return view('admin.aboutUs.index',compact('aboutUs'));
    }



    public function create()
    {
        $languages = Language::all();
        return view('admin.aboutUs.create',compact('languages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'banner' => ['required','image'],
            'description' => ['required','string','max:255'],
            'body' => ['required'],
            'language_id' => ['required',Rule::unique('about_us','language_id')],

        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('banner');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs('images/banners/aboutUs/',$file_name,'public_files');


            AboutUs::create([
                'title' => $request->title,
                'banner' => $file_name,
                'description' => $request->description,
                'body' => $request->body,
                'language_id' => $request->language_id,

            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','درباره ما ایجاد شد');
        return redirect()->route('admin.aboutUs.index');
    }




    public function edit($aboutUs)
    {
        $languages = Language::all();
        $aboutUs = AboutUs::where('id',$aboutUs)->first();
        return view('admin.aboutUs.edit', compact('aboutUs','languages'));
    }


    public function update(Request $request,$aboutUs)
    {

        $aboutUs = AboutUs::where('id',$aboutUs)->first();
        $request->validate([
            'title' => ['required','string','max:255'],
            'banner' => ['image'],
            'description' => ['required','string','max:255'],
            'body' => ['required'],
            'language_id' => ['required',Rule::unique('about_us','language_id')->ignore($aboutUs->id)],

        ]);

        try {
            DB::beginTransaction();
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'body' => $request->body,
                'language_id' => $request->language_id

            ];
            if($request->hasFile('banner')){
                $banner = public_path(env('ABOUT_US_BANNER_IMAGES_PATH') . $aboutUs->banner);
                if (File::exists($banner)) {
                    File::delete($banner);
                }

                $file = $request->file('banner');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs('images/banners/aboutUs/',$file_name,'public_files');


                $data['banner'] = $file_name;

            }


            $aboutUs->update(
                $data
            );


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','درباره ما آپدیت شد');
        return redirect()->route('admin.aboutUs.index');
    }




    public function aboutUsImagesUpload(Request $request)
    {
        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' .$ext ;
        $file->storeAs('images/aboutUs',$file_name,'public_files');

        $funcNum = $request->CKEditorFuncNum;
        $fileUrl = asset('images/aboutUs/'.$file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction( {$funcNum}, '{$fileUrl}' ,'فایل به درستی آپلود شد' );</script>");

    }



    public function destroy(Request $request,$aboutUs)
    {
        $aboutUs = AboutUs::where('id',$aboutUs)->first();
        try {
            DB::beginTransaction();

            //Delete banner
            $banner = public_path(env('ABOUT_US_BANNER_IMAGES_PATH') . $aboutUs->banner);
            if (File::exists($banner)) {
                File::delete($banner);
            }

            // Delete post
            $aboutUs->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','درباره ما مورد نظر حذف شد');
        return redirect()->route('admin.aboutUs.index');
    }



}
