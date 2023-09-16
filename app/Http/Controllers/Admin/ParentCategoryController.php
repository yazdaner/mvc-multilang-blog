<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = ParentCategory::latest()->paginate(20);
        return view('admin.parentCategories.index',compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.parentCategories.create',compact('languages'));
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
            'name' => 'required|unique:categories,name',
            'language_id' => 'required',
        ]);
        ParentCategory::create(
            $request->only('name','language_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر ایجاد شد');
        return redirect()->route('admin.parentCategories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCategory $parentCategory)
    {
        $languages = Language::all();
        return view('admin.parentCategories.edit',compact('parentCategory','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentCategory $parentCategory)
    {
        $request->validate([
            'name' => ['required',Rule::unique('parent_categories','name')->ignore($parentCategory->id)],
            'language_id' => 'required',
        ]);


        $parentCategory->update(
            $request->only('name','language_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر آپدیت شد');
        return redirect()->route('admin.parentCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ParentCategory $parentCategory)
    {
        foreach ($parentCategory->children as $parentCategory) {
            $parentCategory->delete();
        }
        $parentCategory->delete();

        $request->session()->flash('success','دسته بندی مورد نظر حذف شد');
        return redirect()->route('admin.parentCategories.index');
    }
}
