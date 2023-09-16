<?php

namespace App\Http\Controllers\Admin;

use App\Models\FooterLink;
use Illuminate\Http\Request;
use App\Models\FooterLinkCatrgory;
use App\Http\Controllers\Controller;

class FooterLinkController extends Controller
{

    public function index()
    {
        $footerLinks = FooterLink::latest()->paginate(20);
        return view('admin.footerLinks.index', compact('footerLinks'));
    }


    public function create()
    {
        $categories = FooterLinkCatrgory::all();
        return view('admin.footerLinks.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'category_id' => 'required|exists:footer_link_catrgories,id',
        ]);

        FooterLink::create([
            'title' => $request->title,
            'link' => $request->link,
            'category_id' => $request->category_id,
        ]);
        $request->session()->flash('success', 'لینک مورد نظر ایجاد شد');
        return redirect()->route('admin.footerLinks.index');
    }



    public function edit(FooterLink $footerLink)
    {
        $categories = FooterLinkCatrgory::all();
        return view('admin.footerLinks.edit', compact('categories', 'footerLink'));
    }


    public function update(Request $request, FooterLink $footerLink)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'category_id' => 'required|exists:footer_link_catrgories,id',
        ]);

        $footerLink->update([
            'title' => $request->title,
            'link' => $request->link,
            'category_id' => $request->category_id,
        ]);

        $request->session()->flash('success', 'لینک مورد نظر ویرایش شد');
        return redirect()->route('admin.footerLinks.index');
    }


    public function destroy(Request $request, FooterLink $footerLink)
    {
        $footerLink->delete();

        $request->session()->flash('success', 'لینک مورد نظر حذف شد');
        return redirect()->route('admin.footerLinks.index');
    }
}
