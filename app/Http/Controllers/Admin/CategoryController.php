<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(20);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ParentCategory::all();
        return view('admin.categories.create',compact('categories'));
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
            'parent_id' => 'required|exists:parent_categories,id',
        ]);
        Category::create(
            $request->only('name','parent_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر ایجاد شد');
        return redirect()->route('admin.categories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories = ParentCategory::all();
        return view('admin.categories.edit',compact('parentCategories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required',Rule::unique('categories','name')->ignore($category->id)],
            'parent_id' => 'required|exists:parent_categories,id',
        ]);

        $category->slug = null;

        $category->update(
            $request->only('name','parent_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر آپدیت شد');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {
        $category->delete();

        $request->session()->flash('success','دسته بندی مورد نظر حذف شد');
        return redirect()->route('admin.categories.index');
    }
}
