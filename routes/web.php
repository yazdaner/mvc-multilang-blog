<?php

use App\Models\ContactUs;
use App\Models\FooterLinkCatrgory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LangController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\SitemapController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BookmarkController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfessorController;
use App\Http\Controllers\Admin\FooterLinkController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ParentCategoryController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\FooterLinkCatrgoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/post/comment/{post:slug}', [HomeController::class, 'storePostsComment'])->middleware(['auth', 'verified'])->name('post.comment.store');
Route::post('/event/comment/{event:slug}', [HomeController::class, 'storeEventsComment'])->middleware(['auth', 'verified'])->name('event.comment.store');
Route::post('/news/comment/{news:slug}', [HomeController::class, 'storeNewsComment'])->middleware(['auth', 'verified'])->name('news.comment.store');


Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/{event:slug}', [HomeController::class, 'eventShow'])->name('home.event.show');

Route::get('/posts', [HomeController::class, 'posts'])->name('posts.index');
Route::get('/posts/{post:slug}', [HomeController::class, 'postShow'])->name('post.show');

Route::get('/news', [HomeController::class, 'news'])->name('news.index');
Route::get('/news/{news:slug}', [HomeController::class, 'newsShow'])->name('news.show');


Route::get('/tag/{tag:name}', [HomeController::class, 'tagShow'])->name('tag.show');

Route::get('/category/{category:slug}', [HomeController::class, 'CategoryShow'])->name('category.show');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/writer/{user}', [HomeController::class, 'writerContent'])->name('writer');





Route::post('/contact-us-store', [HomeController::class, 'contactUsStore'])->name('home.contact-us.store');



// Route::get('/apply', function () {
//     return view('home.apply.show');
// })->name('apply');


Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs.show');

Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');




Route::prefix('admin-panel/')->middleware(['auth'])->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class,'show'])->name('dashboard')->middleware(['permission:dashboard']);


    Route::resource('parentCategories', ParentCategoryController::class)->middleware(['permission:categories']);
    Route::resource('categories', CategoryController::class)->middleware(['permission:categories']);
    Route::resource('tags', TagController::class)->middleware(['permission:tags']);
    Route::resource('posts', PostController::class)->middleware(['permission:posts']);
    Route::resource('languages', LanguageController::class)->middleware(['permission:languages']);
    Route::resource('users', UserController::class)->middleware(['permission:users']);
    Route::resource('news', NewsController::class)->middleware(['permission:news']);
    Route::resource('events', EventController::class)->middleware(['permission:events']);
    Route::resource('comments', CommentController::class)->middleware(['permission:comments']);
    Route::resource('galleryCategories', GalleryCategoryController::class)->middleware(['permission:galleries']);
    Route::resource('galleries', GalleryController::class)->middleware(['permission:galleries']);
    Route::resource('sliders', SliderController::class)->middleware(['permission:sliders']);
    Route::resource('professors', ProfessorController::class)->middleware(['permission:professors']);
    Route::resource('FAQ', FAQController::class)->middleware(['permission:FAQ']);
    Route::resource('aboutUs', AboutUsController::class)->middleware(['permission:aboutUs']);
    Route::resource('contactUs', ContactUsController::class)->middleware(['permission:contactUs']);
    Route::resource('data', DataController::class)->middleware(['permission:data']);
    Route::resource('settings', SettingController::class)->middleware(['permission:settings']);
    Route::resource('informations', InformationController::class)->middleware(['permission:information']);
    Route::resource('footerLinkCatrgories', FooterLinkCatrgoryController::class)->middleware(['permission:footer']);
    Route::resource('footerLinks', FooterLinkController::class)->middleware(['permission:footer']);
    Route::resource('lessons', LessonController::class)->middleware(['permission:lessons']);

    // upload images in content of a about us
    Route::post('aboutUs/editor/upload', [AboutUsController::class, 'aboutUsImagesUpload'])->name('aboutUs.editor.upload')->middleware(['permission:aboutUs']);

    // upload images in content of a post
    Route::post('/editor/upload', [PostController::class, 'postImagesUpload'])->name('editor-upload')->middleware(['permission:posts|events|news']);

    // edit text of user's comment in the admin pannel
    Route::put('/comments/updateText/{comment}', [CommentController::class, 'updateText'])->name('comments.updateText')->middleware(['permission:comments']);

    // seeen a message of contact us
    Route::post('/seen/{contactUs:id}', [ContactUsController::class, 'seen'])->name('contactUs.seen')->middleware(['permission:contactUs']);


});


Route::get('/logout', function () {
    auth()->logout();
    return view('auth.login');
})->name('logouti');





Route::prefix('profile')->name('profile.')
    ->middleware(['auth', 'verified'])
    ->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('show');
        Route::put('/update/{user}', [ProfileController::class, 'update'])->name('update');
        Route::get('/posts-liked', [ProfileController::class, 'postsLikedShow'])->name('posts-liked');
        Route::get('/comments', [ProfileController::class, 'commentsShow'])->name('comments');
        Route::get('/bookmarks', [ProfileController::class, 'bookmarksShow'])->name('bookmarks');


        Route::get('/lessons', [ProfileController::class, 'lessonsShow'])->name('lessons')->middleware(['role:teacher']);

        Route::get('/homework/{lesson}', [ProfileController::class, 'homeworkList'])->name('homeworks')->middleware(['role:teacher']);
        Route::get('/homework/{lesson}/create', [ProfileController::class, 'homeworkCreate'])->name('homeworkCreate')->middleware(['role:teacher']);
        Route::post('/homework/{lesson}/store', [ProfileController::class, 'homeworkStore'])->name('homeworkStore')->middleware(['role:teacher']);
        Route::get('/homework/edit/{homework}', [ProfileController::class, 'homeworkEdit'])->name('homeworkEdit')->middleware(['role:teacher']);
        Route::put('/homework/{homework}/update', [ProfileController::class, 'homeworkUpdate'])->name('homeworkUpdate')->middleware(['role:teacher']);
        Route::delete('/homework/{homework}/destroy', [ProfileController::class, 'homeworkDestroy'])->name('homeworkDestroy')->middleware(['role:teacher']);

        Route::get('/homeworkAnswers/{homework}', [ProfileController::class, 'homeworkAnswersList'])->name('homeworkAnswersList')->middleware(['role:teacher']);
        Route::post('/homeworkAnswers/approved/{homeworkAnswer}', [ProfileController::class, 'homeworkAnswersApproved'])->name('homeworkAnswersApproved')->middleware(['role:teacher']);



        Route::get('/lessonsList', [ProfileController::class, 'lessonsList'])->name('lessonsList')->middleware(['auth']);

        Route::get('/homeworkAnswer/{lesson}', [ProfileController::class, 'homeworkAnswerIndex'])->name('homeworkAnswerIndex')->middleware(['auth']);
        Route::get('/homeworkAnswer/{homework}/create', [ProfileController::class, 'homeworkAnswerCreate'])->name('homeworkAnswerCreate')->middleware(['auth']);
        Route::post('/homeworkAnswer/{homework}/store', [ProfileController::class, 'homeworkAnswerStore'])->name('homeworkAnswerStore')->middleware(['auth']);



    });



// Route::post('/like/{post:slug}',[LikeController::class,'store'])->middleware(['auth','throttle:like'])->name('like.store');
Route::post('/like/{post:slug}', [LikeController::class, 'store'])->middleware(['auth'])->name('like.store');
Route::post('/bookmark/{post:slug}', [BookmarkController::class, 'store'])->middleware(['auth'])->name('bookmark.store');



Route::get('lang/change', [LangController::class,'change'])->name('changeLang');


Route::get('/earthquakeCatalog', function () {
    auth()->logout();
    return view('home.earthquakeCatalog.show');
})->name('earthquakeCatalog');


Route::get('sitemap.xml', [SitemapController::class, 'index']);
