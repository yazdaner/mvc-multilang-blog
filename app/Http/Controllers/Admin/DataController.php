<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::latest()->paginate(20);
        return view('admin.data.index',compact('data'));
    }


    public function create()
    {
        $languages = Language::all();
        return view('admin.data.create',compact('languages'));

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
            'title' => 'required|string',
            'count' => 'required|integer',
            'color' => 'required|string',
            'svg' => 'required|string',
            'language_id' => 'required',
        ]);
        Data::create(
            $request->only(['title', 'count', 'color', 'svg','language_id'])
        );

        $request->session()->flash('success','دیتا مورد نظر ایجاد شد');
        return redirect()->route('admin.data.index');
    }

    public function edit($data)
    {
        $data = Data::where('id',$data)->first();
        $languages = Language::all();
        return view('admin.data.edit',compact('data','languages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $request->validate([
            'title' => 'required|string',
            'count' => 'required|integer',
            'color' => 'required|string',
            'svg' => 'required|string',
            'language_id' => 'required',
        ]);
        $data->update(
            $request->only(['title', 'count', 'color', 'svg','language_id'])
        );

        $request->session()->flash('success','دیتا مورد نظر ویرایش شد');
        return redirect()->route('admin.data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$data)
    {
        Data::where('id',$data)->first()->delete();

        $request->session()->flash('success','دیتا مورد نظر حذف شد');
        return redirect()->route('admin.data.index');
    }
}
