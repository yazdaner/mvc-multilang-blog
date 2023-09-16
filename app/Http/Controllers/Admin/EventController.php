<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Event;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(20);
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        $tags = Tag::all();

        return view('admin.events.create',compact('languages','tags'));

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
            'banner' => ['required','image'],
            'preview' => ['required'],
            'content' => ['required'],
            'language_id' => ['required'],
            'time' => ['required'],
            'tag_ids' => ['required'],
            'tag_ids.*' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('banner');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs('images/banners/events',$file_name,'public_files');


            $event = Event::create([
                'title' => $request->title,
                'banner' => $file_name,
                'preview' => $request->preview,
                'content' => $request->content,
                'language_id' => $request->language_id,
                'time' => $request->time,
                'user_id' => auth()->user()->id
            ]);
            $event->tags()->attach($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','رویداد مورد نظر ایجاد شد');
        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        $eventTagId = $event->tags->pluck('id')->toArray();
        $languages = Language::all();
        return view('admin.events.edit',compact('event','languages','tags','eventTagId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'banner' => ['nullable','image'],
            'preview' => ['required'],
            'content' => ['required'],
            'language_id' => ['required'],
            'time' => ['required'],
            'tag_ids' => ['required'],
            'tag_ids.*' => ['required'],
        ]);


        try {
            DB::beginTransaction();

            $data = [
                'title' => $request->title,
                'preview' => $request->preview,
                'content' => $request->content,
                'language_id' => $request->language_id,
                'time' => $request->time,
            ];

            if($request->hasFile('banner')){
                $banner = public_path(env('EVENTS_BANNER_IMAGES_PATH') . $event->banner);
                if (File::exists($banner)) {
                    File::delete($banner);
                }

                $file = $request->file('banner');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs('images/banners/events',$file_name,'public_files');


                $data['banner'] = $file_name;

            }


            $event->update(
                $data
            );
            $event->tags()->sync($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','رویداد مورد نظر آپدیت شد');
        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Event $event)
    {
        try {
            DB::beginTransaction();

            //Delete banner
            $banner = public_path(env('EVENTS_BANNER_IMAGES_PATH') . $event->banner);
            if (File::exists($banner)) {
                File::delete($banner);
            }
            // Delete tag
            $event->tags()->detach();
            // Delete post
            $event->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error',$ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success','رویداد مورد نظر حذف شد');
        return redirect()->route('admin.events.index');
    }
}
