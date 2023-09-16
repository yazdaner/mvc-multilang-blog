<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Models\Avatar;
use App\Models\Lesson;
use App\Models\Comment;
use App\Models\Homework;
use App\Models\Language;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\HomeworkAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Artesaos\SEOTools\Facades\SEOTools;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('home.users_profile.index',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2024'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('avatar')) {

            if (isset($user->avatar)) {
                $avatar = public_path(env('USER_IMAGES_PATH') . $user->avatar->image);
                if (File::exists($avatar)) {
                    File::delete($avatar);
                }
                $user->avatar()->delete();
            }


            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $file_name = $user->id . '-' . time() . '.' . $ext;
            $file->storeAs('images/users', $file_name, 'public_files');
            $user->avatar()->create([
                'image' => $file_name,
                'user_id' => auth()->id()
            ]);
        }

        $user->update($data);

        $request->session()->flash('successEditProfile');
        return redirect()->route('profile.show');
    }

    public function postsLikedShow()
    {
        $likes = auth()->user()->likes()->latest()->paginate(10);
        return view('home.users_profile.posts_liked',compact('likes'));
    }

    public function commentsShow()
    {
        $comments = auth()->user()->comments()->where('is_approved',true)->where('commentable_type','App\Models\Post')->latest()->paginate(10);

        return view('home.users_profile.comments',compact('comments'));
    }

    public function bookmarksShow()
    {
        $bookmarks = auth()->user()->bookmarks()->latest()->paginate(10);
        return view('home.users_profile.bookmarks',compact('bookmarks'));
    }
    // teacher homework
    public function lessonsShow()
    {
        $lessons = auth()->user()->lessons;
        return view('home.users_profile.homework.lessons',compact('lessons'));
    }
    public function homeworkList(Lesson $lesson)
    {
        if(!in_array($lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }
        $homeworks = Homework::where('lesson_id',$lesson->id)->latest()->paginate(20);
        return view('home.users_profile.homework.homeworks',compact('homeworks','lesson'));
    }

    public function homeworkCreate(Lesson $lesson)
    {
        if(!in_array($lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }
        return view('home.users_profile.homework.homeworkCreate',compact('lesson'));
    }
    public function homeworkStore(Request $request,Lesson $lesson)
    {
        if(!in_array($lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }

        $request->validate([
            'title' => ['required','string','max:255'],
            'deadline' => ['required'],
            'file' => ['required','mimes:pdf,docx,jpeg,png,svg','max:10000'],
        ]);
        if($request->deadline < now()){
            return redirect()->back();
        }
        try {
            DB::beginTransaction();

            $file = $request->file('file');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs(env('HOMEWORK_FILES_PATH').$lesson->title,$file_name,'public_files');


            Homework::create([
                'title' => $request->title,
                'file' => $file_name,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'lesson_id' => $lesson->id
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','تکلیف مورد نظر ایجاد شد');
        return redirect()->back();
    }

    public function homeworkEdit(Homework $homework)
    {
        if(!in_array($homework->lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }
        return view('home.users_profile.homework.homeworkEdit',compact('homework'));
    }

    public function homeworkUpdate(Request $request,Homework $homework)
    {
        if(!in_array($homework->lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }


        $request->validate([
            'title' => ['required','string','max:255'],
            'deadline' => ['required'],
            'file' => ['mimes:pdf,docx,jpeg,png,svg','max:10000'],
        ]);

        if($request->deadline < now()){
            return redirect()->back();
        }

        try {
            DB::beginTransaction();
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
            ];
            if($request->hasFile('file')){
                $file_path = public_path(env('HOMEWORK_FILES_PATH') . $homework->lesson->title .'/'.$homework->file );
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }

                $file = $request->file('file');
                $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $file_name = $base_name . '_' . time() . '.' .$ext ;
                $file->storeAs(env('HOMEWORK_FILES_PATH').$homework->lesson->title,$file_name,'public_files');

                $data['file'] = $file_name;

            }



            $homework->update($data);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','تکلیف مورد نظر ویرایش شد');
        return redirect()->back();
    }
    public function homeworkDestroy(Request $request,Homework $homework)
    {
        if(!in_array($homework->lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }

        try {
            DB::beginTransaction();

                $file_path = public_path(env('HOMEWORK_FILES_PATH') . $homework->lesson->title .'/'.$homework->file );
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $homework->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','تکلیف مورد نظر حذف شد');
        return redirect()->back();
    }


    public function homeworkAnswersList(Homework $homework)
    {
        if(!in_array($homework->lesson->id,auth()->user()->getlessonsId())){
            abort(403);
        }
        $homeworkAnswers = HomeworkAnswer::where('homework_id',$homework->id)->latest()->paginate(20);
        return view('home.users_profile.homework.homeworkAnswers',compact('homework','homeworkAnswers'));
    }

    public function homeworkAnswersApproved(HomeworkAnswer $homeworkAnswer)
    {
        if(!in_array($homeworkAnswer->homework->lesson->id,auth()->user()->getlessonsId())){
            return response()->json([],403);
        }

        $approved =!($homeworkAnswer->getRawOriginal('approved'));
        $homeworkAnswer->update([
            'approved' => $approved
        ]);

        return response()->json($homeworkAnswer->id,200);

    }
    // student homework
    public function lessonsList()
    {
        $lessons = Lesson::all();
        return view('home.users_profile.homeworkAnswer.lessons',compact('lessons'));
    }
    public function homeworkAnswerIndex(Lesson $lesson)
    {
        $homeworks = Homework::where('lesson_id',$lesson->id)->where('deadline','>',now())->latest()->paginate(20);
        return view('home.users_profile.homeworkAnswer.homeworks',compact('homeworks','lesson'));
    }


    public function homeworkAnswerCreate(Request $request,Homework $homework)
    {
        if($homework->deadline < now()){
            abort(403);
        }
        return view('home.users_profile.homeworkAnswer.homeworkCreate',compact('homework'));
    }
    public function homeworkAnswerStore(Request $request,Homework $homework)
    {
        if($homework->deadline < now()){
            abort(403);
        }

        $request->validate([
            'name' => ['required','string','max:255'],
            'file' => ['required','mimes:pdf,docx,jpeg,png,svg','max:10000'],
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('file');
            $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $file_name = $base_name . '_' . time() . '.' .$ext ;
            $file->storeAs(env('HOMEWORK_ANSWER_FILES_PATH').$homework->title,$file_name,'public_files');


            HomeworkAnswer::create([
                'name' => $request->name,
                'file' => $file_name,
                'description' => $request->description,
                'homework_id' => $homework->id,
                'user_id' => auth()->user()->id
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $request->session()->flash('error', $ex->getMessage());
            return redirect()->back();
        }

        $request->session()->flash('success','تکلیف مورد نظر ارسال شد');
        return redirect()->back();
    }
}
