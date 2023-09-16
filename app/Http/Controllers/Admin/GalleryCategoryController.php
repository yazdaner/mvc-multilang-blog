<?php

namespace App\Http\Controllers\Admin;


use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $gallery_categories = GalleryCategory::latest()->paginate(20);
        return view('admin.gallery_categories.index', compact('gallery_categories'));
    }


    public function create()
    {
        $languages = Language::all();
        return view('admin.gallery_categories.create',compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:gallery_categories,title',
            'language_id' => 'required',
        ]);
        GalleryCategory::create(
            $request->only(['title', 'language_id'])
        );

        $request->session()->flash('success', 'دسته بندی تصاویر مورد نظر ایجاد شد');
        return redirect()->route('admin.galleryCategories.index');
    }




    public function edit(GalleryCategory $galleryCategory)
    {
        $languages = Language::all();
        return view('admin.gallery_categories.edit', compact('galleryCategory','languages'));
    }


    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'title' => ['required', Rule::unique('gallery_categories', 'title')->ignore($galleryCategory->id)],
            'language_id' => 'required',
        ]);
        $galleryCategory->update(
            $request->only(['title', 'language_id'])
        );

        $request->session()->flash('success', 'دسته بندی تصاویر مورد نظر ویرایش شد');
        return redirect()->route('admin.galleryCategories.index');
    }


    public function destroy(Request $request, GalleryCategory $galleryCategory)
    {
        try {
            DB::beginTransaction();



            foreach ($galleryCategory->images as $item) {
                $image = public_path(env('GALLERY_IMAGES_PATH') . $item->image);
                if (File::exists($image)) {
                    File::delete($image);
                }
                $item->delete();
            }

            $galleryCategory->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success', 'دسته بندی تصاویر مورد نظر حذف شد');
        return redirect()->route('admin.galleryCategories.index');
    }
}
