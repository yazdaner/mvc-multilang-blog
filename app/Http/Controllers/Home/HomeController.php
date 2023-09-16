<?php

namespace App\Http\Controllers\Home;

use App\Models\FAQ;
use App\Models\Tag;
use App\Models\Data;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Language;
use App\Models\ViewPage;
use App\Models\ContactUs;
use App\Models\Professor;
use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    public function index(Request $request,ViewPage $viewPage)
    {


        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;
        $info = Information::where('language_id', $langId)->first();
        $setting = Setting::first();

        // SEO

        // SEOMeta::addKeyword(['key1', 'key2', 'key3s']);
        SEOTools::setDescription($info->description ?? '');
        SEOTools::opengraph()->setUrl(route('home'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage("{{asset('images/logos/logo.png')}}");

        SEOTools::setCanonical(route('home'));
        OpenGraph::addProperty('locale', 'fa-IR');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        OpenGraph::setPlace([
           'location:latitude' => $setting->latitude ?? '',
           'location:longitude' => $setting->longitude ?? '',
       ]);





        $gallery = Gallery::where('language_id',$langId)->get();
        $categories_gallery = GalleryCategory::where('language_id',$langId)->get();


        $sliders = Slider::where('language_id',$langId)->get()->reverse();
        $professors = Professor::where('language_id',$langId)->get();
        $FAQ = FAQ::where('language_id',$langId)->get();
        $data = Data::where('language_id',$langId)->get();

        $aboutUs = AboutUs::where('language_id',$langId)->first(['title','description','banner']);

        $events = Event::where('language_id',$langId)->latest()->take(3)->get();



        $posts = Post::where('language_id',$langId)->latest()->take(9)->get();
        $newses = News::where('language_id',$langId)->latest()->take(3)->get();



        if(! Auth::check()){//guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())));
            $id = $request->ip();
            } else {
                $cookie_name = (Auth::user()->id);//logged in user
                $id = $cookie_name;

            }
            if(Cookie::get($cookie_name) == ''){//check if cookie is set
                $cookie = cookie($cookie_name, '1', 60);//set the cookie
                $viewPage->insertData($id);
                return response()
                ->view('home.index',compact('events','posts','newses','gallery','categories_gallery','sliders','professors','FAQ','aboutUs','data','setting','info'))
                ->withCookie($cookie);//store the cookie
            } else {
                return view('home.index',compact('events','posts','newses','gallery','categories_gallery','sliders','professors','FAQ','aboutUs','data','setting','info'));

            }
    }

    public function gallery()
    {

        $gallery = Gallery::all();
        $categories_gallery = GalleryCategory::all();
        return view('home.gallery.index',compact('gallery','categories_gallery'));
    }

    public function news()
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;
        $newses = News::where('language_id',$langId)->latest()->paginate(1);
        return view('home.news.index',compact('newses'));
    }

    public function newsShow(News $news,Request $request)
    {
        OpenGraph::setTitle($news->title)
        ->setDescription($news->preview)
        ->setType('article')
        ->setArticle([
            'published_time' => 'datetime',
            'modified_time' => 'datetime',
            'expiration_time' => 'datetime',
            'author' => $news->user->name,
            'tag' => $news->tags->pluck('name')->toArray()
        ]);
        SEOMeta::addKeyword($news->tags->pluck('name')->toArray());

        $news->load(['user','category','tags']);
        $comments = $news->comments()->where('comment_id',null)->where('is_approved',true)->latest()->paginate(20);
        if(! Auth::check()){//guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $news->id.'-'.'news');
            } else {
                $cookie_name = (Auth::user()->id.'-'. $news->id.'-'.'news');//logged in user
            }
            if(Cookie::get($cookie_name) == ''){//check if cookie is set
                $cookie = cookie($cookie_name, '1', 60);//set the cookie
                $news->incrementReadCount();//count the view
                return response()
                ->view('home.news.show',compact('news','comments'))
                ->withCookie($cookie);//store the cookie
            } else {
                return  view('home.news.show',compact('news','comments'));//this view is not counted
            }
    }

    public function posts()
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;
        $posts = Post::where('language_id',$langId)->latest()->paginate(1);
        return view('home.posts.index',compact('posts'));
    }


    public function postShow(Post $post,Request $request)
    {
        OpenGraph::setTitle($post->title)
            ->setDescription($post->preview)
            ->setType('article')
            ->setArticle([
                'published_time' => 'datetime',
                'modified_time' => 'datetime',
                'expiration_time' => 'datetime',
                'author' => $post->user->name,
                'tag' => $post->tags->pluck('name')->toArray()
            ]);
        SEOMeta::addKeyword($post->tags->pluck('name')->toArray());

        $post->load(['user','category','tags']);
        $comments = $post->comments()->where('comment_id',null)->where('is_approved',true)->latest()->paginate(20);
        if(! Auth::check()){//guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $post->id.'-'.'post');
            } else {
                $cookie_name = (Auth::user()->id.'-'. $post->id.'-'.'post');//logged in user
            }
            if(Cookie::get($cookie_name) == ''){//check if cookie is set
                $cookie = cookie($cookie_name, '1', 60);//set the cookie
                $post->incrementReadCount();//count the view
                return response()
                ->view('home.posts.show',compact('post','comments'))
                ->withCookie($cookie);//store the cookie
            } else {
                return  view('home.posts.show',compact('post','comments'));//this view is not counted
            }

    }

    public function storePostsComment(Request $request,Post $post)
    {

        $request->validate([
            'body' => 'required',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'is_approved' => 0,
        ]);

        $request->session()->flash('successSendComment');
        return redirect()->back();
    }


    public function storeEventsComment(Request $request,Event $event)
    {
        $request->validate([
            'body' => 'required',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $event->comments()->create([
            'body' => $request->body,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'is_approved' => 0,
        ]);

        $request->session()->flash('successSendComment');
        return redirect()->back();
    }

    public function storeNewsComment(Request $request,News $news)
    {
        $request->validate([
            'body' => 'required',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $news->comments()->create([
            'body' => $request->body,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'is_approved' => 0,
        ]);

        $request->session()->flash('successSendComment');
        return redirect()->back();
    }

    public function CategoryShow(Category $category)
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;

        $posts = $category->posts()->where('language_id',$langId)->with('user')->latest()->paginate(1);
        $newses = $category->newses()->where('language_id',$langId)->with('user')->latest()->paginate(1);
        return view('home.category.show',compact('category','posts','newses'));

    }

    public function writerContent(User $user)
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;
        $posts = $user->posts()->where('language_id',$langId)->with('user')->latest()->paginate(1);
        $newses = $user->newses()->where('language_id',$langId)->with('user')->latest()->paginate(1);
        $events = $user->events()->where('language_id',$langId)->with('user')->latest()->paginate(1);
        return view('home.writer.show',compact('posts','newses','events'));

    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $posts = Post::where('title','LIKE',"%{$request->search}%")->latest()->paginate(1);
        $events  = Event::where('title','LIKE',"%{$request->search}%")->latest()->paginate(1);
        $newses = News::where('title','LIKE',"%{$request->search}%")->latest()->paginate(1);
        return view('home.search.show',compact('posts','events','newses'));

    }


    public function events()
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;
        $events = Event::where('language_id',$langId)->latest()->paginate(1);
        return view('home.events.index',compact('events'));
    }

    public function eventShow(Event $event,Request $request)
    {
        OpenGraph::setTitle($event->title)
        ->setDescription($event->preview)
        ->setType('article')
        ->setArticle([
            'published_time' => 'datetime',
            'modified_time' => 'datetime',
            'expiration_time' => 'datetime',
            'author' => $event->user->name,
            'tag' => $event->tags->pluck('name')->toArray()
        ]);
        SEOMeta::addKeyword($event->tags->pluck('name')->toArray());

        $event->load(['user','tags']);

        $comments = $event->comments()->where('comment_id',null)->where('is_approved',true)->latest()->paginate(20);

        if(! Auth::check()){//guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $event->id.'-'.'event');
            } else {
                $cookie_name = (Auth::user()->id.'-'. $event->id.'-'.'event');//logged in user
            }
            if(Cookie::get($cookie_name) == ''){//check if cookie is set
                $cookie = cookie($cookie_name, '1', 60);//set the cookie
                $event->incrementReadCount();//count the view
                return response()
                ->view('home.events.show',compact('event','comments'))
                ->withCookie($cookie);//store the cookie
            } else {
                return  view('home.events.show',compact('event','comments'));//this view is not counted
            }


    }


    public function tagShow(Tag $tag)
    {

        $posts = $tag->posts()->with('user')->latest()->paginate(1);
        $events = $tag->events()->with('user')->latest()->paginate(1);
        $newses = $tag->newses()->with('user')->latest()->paginate(1);
        return view('home.tag.show',compact('tag','posts','newses','events'));
    }

    public function aboutUs()
    {
        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;

        $aboutUs = AboutUs::where('language_id',$langId)->first('body');

        return  view('home.about_us.show',compact('aboutUs'));

    }

    public function contactUs()
    {

        $langId = Language::where('name',session()->get('locale') ?? App::getLocale())->first()->id ;

        $setting = Setting::first();

        $info = Information::where('language_id', $langId)->first();


        return  view('home.contact_us.show',compact('setting','info'));

    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|min:4|max:100',
            'text' => 'required|string|min:4|max:2000',

        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,
        ]);



        $request->session()->flash('successSendMessage');
        return redirect()->back();
    }


}
