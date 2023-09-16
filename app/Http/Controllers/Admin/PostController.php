<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $posts = Post::where('title','LIKE',"%{$request->search}%")->latest()->paginate(20);
        }else{
            $posts = Post::latest()->paginate(20);
        }
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
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
            $file->storeAs('images/banner',$file_name,'public_files');

            $lang = Category::where('id',$request->category_id)->first()->parent->language->id;

            $post = Post::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'banner' => $file_name,
                'preview' => $request->preview,
                'content' => $request->content,
                'language_id' => $lang,
                'user_id' => auth()->user()->id
            ]);

            $post->tags()->attach($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','مقاله مورد نظر ایجاد شد');
        return redirect()->route('admin.posts.index');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $postTagId = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit',compact('post','categories','tags','postTagId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
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
                $banner = public_path(env('BANNER_IMAGES_PATH') . $post->banner);
                if (File::exists($banner)) {
                    File::delete($banner);
                }

                $file = $request->file('banner');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs('images/banner',$file_name,'public_files');


                $data['banner'] = $file_name;

            }


            $post->update(
                $data
            );

            $post->tags()->sync($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','مقاله مورد نظر آپدیت شد');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Post $post)
    {
        try {
            DB::beginTransaction();

            //Delete banner
            $banner = public_path(env('BANNER_IMAGES_PATH') . $post->banner);
            if (File::exists($banner)) {
                File::delete($banner);
            }
            // Delete tag
            $post->tags()->detach();



            // Delete post
            $post->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','مقاله مورد نظر حذف شد');
        return redirect()->route('admin.posts.index');
    }

    public function postImagesUpload(Request $request)
    {
        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' .$ext ;
        $file->storeAs('images/posts',$file_name,'public_files');

        $funcNum = $request->CKEditorFuncNum;
        $fileUrl = asset('images/posts/'.$file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction( {$funcNum}, '{$fileUrl}' ,'فایل به درستی آپلود شد' );</script>");

    }
}
