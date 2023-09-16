<?php

namespace App\Http\Controllers\Admin;

use App\Models\Like;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ViewPage;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function show()
    {
        $v = verta()->startMonth()->subMonth();

        $date = verta()->jalaliToGregorian($v->year,$v->month,$v->day);
        $date2 = Carbon::create($date[0],$date[1],$date[2]);

        $view = ViewPage::where('created_at','>',$date2)->get();

        $monthName = $view->map(function ($item){
            return verta($item->created_at)->format('%B %Y');
        });

        $result = array_count_values($monthName->toArray());


        $allViewsPage = ViewPage::count();
        $lableMonthName = array_keys($result);
        $viewPagePerMonth = array_values($result);


        $array=[];
        for ($i=0; $i < count($lableMonthName); $i++) {
            array_push($array,["month"=>$lableMonthName[$i],"visits"=>$viewPagePerMonth[$i]]);
        }

        $chartOneDate = $array;

        $allPostsViews = $this->getAllPostsViews();
        $allEventsViews = $this->getAllEventsViews();
        $allNewsViews = $this->getAllNewsViews();

        $mostNewsView = $this->mostNewsView();
        $mostEventView = $this->mostEventView();
        $mostPostView = $this->mostPostView();
        $lastUsers = $this->lastUsers();
        $lastComments = $this->lastComments();
        $allViewsContent = $this->getAllPostsViews() + $this->getAllEventsViews() + $this->getAllNewsViews() ;
        $bookmarksCount = Bookmark::all()->count();
        $likesCount = Like::all()->count();
        $commentsCount = Comment::all()->count();
        return view('admin.dashboard',compact('allViewsContent','bookmarksCount','likesCount','commentsCount','lastComments','lastUsers','mostPostView','mostEventView','mostNewsView','allPostsViews','allEventsViews','allNewsViews','allViewsPage','lableMonthName','viewPagePerMonth','chartOneDate'));
    }

    public function getAllPostsViews()
    {
        $item = Post::all()->pluck('views');
        $count = 0;
        foreach ($item as $value) {
            $count += $value;
        }
        return $count;
    }

    public function getAllEventsViews()
    {
        $item = Event::all()->pluck('views');
        $count = 0;
        foreach ($item as $value) {
            $count += $value;
        }
        return $count;
    }

    public function getAllNewsViews()
    {
        $item = News::all()->pluck('views');
        $count = 0;
        foreach ($item as $value) {
            $count += $value;
        }
        return $count;
    }


    public function lastComments()
    {
        $comments = Comment::take(5)->orderByDesc('id')->get();
        return $comments;
    }

    public function lastUsers()
    {
        $users = User::take(5)->orderByDesc('id')->get();
        return $users;
    }

    public function mostPostView()
    {
        $item = Post::all()->pluck('views')->max();
        $item = News::all()->pluck('views')->max();
        if ($item == 0) {
            return 0 ;
        }
        return round($item / $this->getAllPostsViews() * 100);

    }

    public function mostEventView()
    {
        $item = Event::all()->pluck('views')->max();
        if ($item == 0) {
            return 0 ;
        }
        return round($item / $this->getAllEventsViews() * 100);

    }
    public function mostNewsView()
    {
        $item = News::all()->pluck('views')->max();
        if ($item == 0) {
            return 0 ;
        }
        return round($item / $this->getAllNewsViews() * 100);

    }

}
