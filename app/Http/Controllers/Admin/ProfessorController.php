<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProfessorController extends Controller
{

    public function index()
    {
        $items = Professor::latest()->paginate(20);
        return view('admin.professors.index', compact('items'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.professors.create',compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
            'language_id' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('image');
            $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' . $ext;
            $file->storeAs('images/professors', $file_name, 'public_files');


            Professor::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $file_name,
                'language_id' =>$request->language_id,
            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success', 'استاد مورد نظر ثبت شد');
        return redirect()->route('admin.professors.index');
    }


    public function edit(Professor $professor)
    {
        $languages = Language::all();
        return view('admin.professors.edit', compact('professor','languages'));
    }


    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'language_id' => ['required'],
        ]);

        try {
            DB::beginTransaction();
            $data = [

                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'language_id' =>$request->language_id,

            ];
            if ($request->hasFile('image')) {
                $image = public_path(env('PROFESSOR_IMAGES_PATH') . $professor->image);
                if (File::exists($image)) {
                    File::delete($image);
                }

                $file = $request->file('image');
                $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' . $ext;
                $file->storeAs('images/professors', $file_name, 'public_files');


                $data['image'] = $file_name;
            }


            $professor->update(
                $data
            );


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success', 'استاد مورد نظر آپدیت شد');
        return redirect()->route('admin.professors.index');
    }

  
    public function destroy(Request $request, Professor $professor)
    {
        try {
            DB::beginTransaction();

            $image = public_path(env('PROFESSOR_IMAGES_PATH') . $professor->image);
            if (File::exists($image)) {
                File::delete($image);
            }

            // Delete professor
            $professor->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }
        $request->session()->flash('success', 'استاد مورد نظر حذف شد');
        return redirect()->route('admin.professors.index');
    }
}
