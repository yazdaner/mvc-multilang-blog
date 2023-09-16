<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class LessonController extends Controller
{

    public function index()
    {
        $lessons = Lesson::latest()->paginate(20);
        return view('admin.lessons.index', compact('lessons'));
    }


    public function create()
    {
        $role = Role::where('name','teacher')->first()->id;
        $users = array_values(DB::table('model_has_roles')->where('model_type', 'App\Models\User')->where('role_id',$role)->pluck('model_id')->toArray());
        $teachers  = User::whereIn('id', $users)->get();

        return view('admin.lessons.create',compact('teachers'));
    }

    public function store(Request $request)
    {
        $role = Role::where('name','teacher')->first()->id;
        $users = array_values(DB::table('model_has_roles')->where('model_type', 'App\Models\User')->where('role_id',$role)->pluck('model_id')->toArray());


        $request->validate([
            'title' => 'required|unique:lessons,title',
            'user_id' => 'required|exists:users,id',
        ]);

        if(!in_array($request->user_id,$users)){

            return redirect()->back();
        }

        Lesson::create(
            $request->only('title','user_id')
        );

        $request->session()->flash('success','درس مورد نظر ایجاد شد');
        return redirect()->route('admin.lessons.index');
    }



    public function edit(Lesson $lesson)
    {
        $role = Role::where('name','teacher')->first()->id;
        $users = array_values(DB::table('model_has_roles')->where('model_type', 'App\Models\User')->where('role_id',$role)->pluck('model_id')->toArray());
        $teachers  = User::whereIn('id', $users)->get();

        return view('admin.lessons.edit',compact('teachers','lesson'));

    }

    public function update(Request $request, Lesson $lesson)
    {
        $role = Role::where('name','teacher')->first()->id;
        $users = array_values(DB::table('model_has_roles')->where('model_type', 'App\Models\User')->where('role_id',$role)->pluck('model_id')->toArray());


        $request->validate([
            'title' => ['required', Rule::unique('lessons', 'title')->ignore($lesson->id)],
            'user_id' => 'required|exists:users,id',
        ]);

        if(!in_array($request->user_id,$users)){

            return redirect()->back();
        }

        $lesson->update(
            $request->only('title','user_id')
        );

        $request->session()->flash('success','درس مورد نظر ویرایش شد');
        return redirect()->route('admin.lessons.index');
    }

    public function destroy(Request $request,Lesson $lesson)
    {
        $lesson->delete();

        $request->session()->flash('success','درس مورد نظر حذف شد');
        return redirect()->route('admin.lessons.index');
    }
}
