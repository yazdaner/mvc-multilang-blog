<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::latest()->paginate(20);
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
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
            'name' => 'required|unique:languages,name',
            'display_name' => 'required|unique:languages,display_name',
            'direction' => 'required',
        ]);
        Language::create(
            $request->only(['name','display_name','direction'])
        );

        $request->session()->flash('success', 'زبان مورد نظر ایجاد شد');
        return redirect()->route('admin.languages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => ['required', Rule::unique('languages', 'name')->ignore($language->id)],
            'display_name' => ['required', Rule::unique('languages', 'display_name')->ignore($language->id)],
            'direction' => 'required',
        ]);
        $language->update(
            $request->only(['name','display_name','direction'])
        );

        $request->session()->flash('success', 'زبان مورد نظر ایجاد شد');
        return redirect()->route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Language $language)
    {
        $language->delete();

        $request->session()->flash('success','زبان مورد نظر حذف شد');
        return redirect()->route('admin.languages.index');
    }
}
