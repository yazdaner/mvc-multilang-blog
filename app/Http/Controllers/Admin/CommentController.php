<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->status)){
            $comments = Comment::where('is_approved', !! $request->status)->with(['user','post'])->withCount('replies')->latest()->paginate(20);
        }else{
            $comments = Comment::with(['user','post'])->withCount('replies')->latest()->paginate(20);
        }
        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Comment $comment)
    {
        $approved =!($comment->getRawOriginal('is_approved'));
        $comment->update([
            'is_approved' => $approved
        ]);
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Comment $comment)
    {
        $comment->delete();
        $request->session()->flash('success','کامنت مورد نظر حذف شد');
        return redirect()->route('admin.comments.index');
    }


    public function updateText(Request $request,Comment $comment)
    {
        $request->validate([
            'body' => ['required','string'],
        ]);

        $comment->update(
            $request->only('body')
        );

        $request->session()->flash('success', 'کامنت مورد نظر ویرایش شد');
        return redirect()->route('admin.comments.index');
    }
}
