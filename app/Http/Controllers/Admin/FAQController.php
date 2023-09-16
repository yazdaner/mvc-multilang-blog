<?php

namespace App\Http\Controllers\Admin;

use App\Models\FAQ;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{

    public function index()
    {
        $items = FAQ::latest()->paginate(20);
        return view('admin.FAQ.index',compact('items'));
    }


    public function create()
    {
        $languages = Language::all();
        return view('admin.FAQ.create',compact('languages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'language_id' => 'required',

        ]);
        FAQ::create(
            $request->only(['title','description','language_id'])
        );

        $request->session()->flash('success','سوال متداول مورد نظر ایجاد شد');
        return redirect()->route('admin.FAQ.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $FAQ)
    {
        $languages = Language::all();
        return view('admin.FAQ.edit',compact('FAQ','languages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $FAQ)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'language_id' => 'required',
        ]);
        $FAQ->update(
            $request->only(['title','description','language_id'])
        );

        $request->session()->flash('success','سوال متداول مورد نظر ویرایش شد');
        return redirect()->route('admin.FAQ.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FAQ $FAQ)
    {
        $FAQ->delete();

        $request->session()->flash('success','تگ مورد نظر حذف شد');
        return redirect()->route('admin.FAQ.index');
    }
}
