<?php

namespace App\Providers;

use App\Models\News;
use App\Models\Post;
use App\Models\Event;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Language;
use App\Models\FooterLink;
use App\Models\FooterLinkCatrgory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{


    public function register()
    {
        //
    }


    public function boot()
    {
        // $langId = Language::where('name',App::getLocale())->first()->id ;


        // $gallery = Gallery::get()->isNotEmpty();
        // $news = News::where('language_id',$langId)->get()->isNotEmpty();
        // $events = Event::where('language_id',$langId)->get()->isNotEmpty();
        // $posts = Post::where('language_id',$langId)->get()->isNotEmpty();
        // $aboutUs = AboutUs::where('language_id',$langId)->get()->isNotEmpty();

        // $categories = Category::where('language_id',$langId)->with('children')->where('parent_id', 0)->get();

        // View::composer('home.sections.header', function ($view) use ($categories, $gallery, $news, $events, $posts,$aboutUs) {
        //     $view->with(['categories' => $categories, 'gallery' => $gallery, 'news' => $news, 'events' => $events, 'posts' => $posts, 'aboutUs' => $aboutUs]);
        // });

        // View::composer('home.sections.mobile_header', function ($view) use ($categories, $gallery, $news, $events, $posts,$aboutUs) {
        //     $view->with(['categories' => $categories, 'gallery' => $gallery, 'news' => $news, 'events' => $events, 'posts' => $posts, 'aboutUs' => $aboutUs]);
        // });


        // $setting = Setting::first();
        // $footerLinkCatrgories = FooterLinkCatrgory::all();

        // View::composer('home.sections.footer', function ($view) use ($setting,$footerLinkCatrgories) {
        //     $view->with(['setting' => $setting, 'footerLinkCatrgories' => $footerLinkCatrgories]);
        // });
    }
}
