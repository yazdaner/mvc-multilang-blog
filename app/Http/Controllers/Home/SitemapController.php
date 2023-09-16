<?php

namespace App\Http\Controllers\Home;

use App\Models\News;
use App\Models\Post;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $events = Event::latest()->get();
        $news = News::latest()->get();

        return response()->view('home.sitemap.sitemap', [
            'posts' => $posts,
            'events' => $events,
            'news' => $news,
        ])->header('Content-Type', 'text/xml');
    }
}
