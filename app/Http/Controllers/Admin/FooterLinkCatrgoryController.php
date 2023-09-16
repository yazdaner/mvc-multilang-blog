<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\FooterLinkCatrgory;
use App\Http\Controllers\Controller;

class FooterLinkCatrgoryController extends Controller
{

    public function index()
    {
        $footerLinkCatrgories = FooterLinkCatrgory::latest()->paginate(20);
        return view('admin.footerLinkCatrgories.index', compact('footerLinkCatrgories'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.footerLinkCatrgories.create',compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:footer_link_catrgories,title',
            'language_id' => 'required',

        ]);
        FooterLinkCatrgory::create(
            $request->only(['title','language_id'])
        );

        $request->session()->flash('success','دسته بندی مورد نظر ایجاد شد');
        return redirect()->route('admin.footerLinkCatrgories.index');
    }


    public function edit(FooterLinkCatrgory $footerLinkCatrgory)
    {
        $languages = Language::all();
        return view('admin.footerLinkCatrgories.edit',compact('footerLinkCatrgory','languages'));
    }

    public function update(Request $request, FooterLinkCatrgory $footerLinkCatrgory)
    {
        $request->validate([
            'title' => ['required', Rule::unique('footer_link_catrgories', 'title')->ignore($footerLinkCatrgory->id)],
            'language_id' => 'required',
        ]);
        $footerLinkCatrgory->update(
            $request->only(['title','language_id'])

        );

        $request->session()->flash('success','دسته بندی مورد نظر ایجاد شد');
        return redirect()->route('admin.footerLinkCatrgories.index');
    }


    public function destroy(Request $request,FooterLinkCatrgory $footerLinkCatrgory)
    {


        foreach ($footerLinkCatrgory->links as $item) {
            $item->delete();
        }

        $footerLinkCatrgory->delete();

        $request->session()->flash('success','دسته بندی مورد نظر حذف شد');
        return redirect()->route('admin.footerLinkCatrgories.index');
    }
}
