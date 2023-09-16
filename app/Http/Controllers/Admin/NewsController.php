<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(20);
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id','!=',0)->get();
        $languages = Language::all();
        $tags = Tag::all();
        return view('admin.news.create',compact('categories','languages','tags'));

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
            'title' => ['required','string','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'banner' => ['required','image'],
            'preview' => ['required'],
            'content' => ['required'],
            'tag_ids' => ['required'],
            'tag_ids.*' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('banner');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs('images/news/banner',$file_name,'public_files');

            $lang = Category::where('id',$request->category_id)->first()->parent->language->id;

            $news = News::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'banner' => $file_name,
                'preview' => $request->preview,
                'content' => $request->content,
                'language_id' => $lang,
                'user_id' => auth()->user()->id
            ]);

            $news->tags()->attach($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','خبر مورد نظر ایجاد شد');
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::where('parent_id','!=',0)->get();
        $languages = Language::all();
        $tags = Tag::all();
        $newsTagId = $news->tags->pluck('id')->toArray();
        return view('admin.news.edit',compact('news','categories','languages','tags','newsTagId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'banner' => ['nullable','image'],
            'preview' => ['required'],
            'content' => ['required'],
            'tag_ids' => ['required'],
            'tag_ids.*' => ['required'],
        ]);


        try {
            DB::beginTransaction();
            $lang = Category::where('id',$request->category_id)->first()->parent->language->id;

            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'preview' => $request->preview,
                'content' => $request->content,
                'language_id' => $lang,
            ];

            if($request->hasFile('banner')){
                $banner = public_path(env('NEWS_BANNER_IMAGES_PATH') . $news->banner);
                if (File::exists($banner)) {
                    File::delete($banner);
                }

                $file = $request->file('banner');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs('images/news/banner',$file_name,'public_files');


                $data['banner'] = $file_name;

            }


            $news->update(
                $data
            );
            $news->tags()->sync($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','خبر مورد نظر آپدیت شد');
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,News $news)
    {
        try {
            DB::beginTransaction();

            //Delete banner
            $banner = public_path(env('NEWS_BANNER_IMAGES_PATH') . $news->banner);
            if (File::exists($banner)) {
                File::delete($banner);
            }
            // Delete tag
            $news->tags()->detach();
            // Delete post
            $news->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','مقاله مورد نظر حذف شد');
        return redirect()->route('admin.news.index');
    }
}
