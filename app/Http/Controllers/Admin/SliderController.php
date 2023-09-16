<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.sliders.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['nullable','string','max:255'],
            'caption' => ['nullable','string','max:255'],
            'image' => ['required','image'],
            'language_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('image');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs('images/sliders',$file_name,'public_files');


             Slider::create([
                'title' => $request->title,
                'caption' => $request->caption,
                'image' => $file_name,
                'language_id' => $request->language_id,
            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','اسلاید مورد نظر ایجاد شد');
        return redirect()->route('admin.sliders.index');

    }


    public function edit(Slider $slider)
    {
        $languages = Language::all();
        return view('admin.sliders.edit', compact('slider','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => ['nullable','string','max:255'],
            'caption' => ['nullable','string','max:255'],
            'image' => ['nullable','image'],
            'language_id' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $data = [

                'title' => $request->title,
                'caption' => $request->caption,
                'language_id' => $request->language_id,

            ];
            if($request->hasFile('image')){
                $image = public_path(env('SLIDER_IMAGES_PATH') . $slider->image);
                if (File::exists($image)) {
                    File::delete($image);
                }

                $file = $request->file('image');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs('images/sliders',$file_name,'public_files');


                $data['image'] = $file_name;

            }


            $slider->update(
                $data
            );


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','اسلاید مورد نظر آپدیت شد');
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Slider $slider)
    {
        try {
            DB::beginTransaction();

            $image = public_path(env('SLIDER_IMAGES_PATH') . $slider->image);
            if (File::exists($image)) {
                File::delete($image);
            }

            // Delete slider
            $slider->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','اسلاید مورد نظر حذف شد');
        return redirect()->route('admin.sliders.index');
    }
}
