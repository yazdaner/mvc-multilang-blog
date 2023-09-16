<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('admin.galleries.index',compact('galleries'));
    }


    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.galleries.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'caption' => ['required','string','max:255'],
            'category_id' => ['required','exists:gallery_categories,id'],
            'image' => ['required','image'],
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('image');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs('images/galleries',$file_name,'public_files');

            $language_id = GalleryCategory::where('id',$request->category_id)->first()->language->id;
             Gallery::create([
                'title' => $request->title,
                'caption' => $request->caption,
                'category_id' => $request->category_id,
                'language_id' => $language_id,
                'image' => $file_name,

            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','تصویر مورد نظر ایجاد شد');
        return redirect()->route('admin.galleries.index');
    }


    public function destroy(Request $request,Gallery $gallery)
    {
        try {
            DB::beginTransaction();


                $image = public_path(env('GALLERY_IMAGES_PATH') . $gallery->image);
                if (File::exists($image)) {
                    File::delete($image);
                }
                $gallery->delete();

            $gallery->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success', 'تصویر مورد نظر حذف شد');
        return redirect()->route('admin.galleries.index');
    }
}
