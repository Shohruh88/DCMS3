<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleSelectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PdfReaderController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\PublishedController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\PublishSubscriberController;
use App\Http\Controllers\RubrikaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberFizikController;
use App\Http\Controllers\UpressController;
use Illuminate\Support\Facades\Route;

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

// Home Page
Route::get('/', [HomeController::class, 'homeList'])->name('home');

// Language Route
Route::get('/lang', [LanguageController::class, 'changeLang'])->name('changeLang');

// About Us
Route::get('/about-us', function () {
    return view('aboutUs');
})->name('aboutus');

//News Route
Route::get('/news', [NewsController::class, 'index'])->name('news');

// Search route
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('errorSearch', [SearchController::class, 'errorSearch'])->name('searchError');
Route::post('search', [SearchController::class, 'search'])->name('search.search');
Route::get('search/{id}', [SearchController::class, 'show']);

// Profile route
Route::get('profile', [SubscriberFizikController::class, 'profile'])->name('profile');
Route::get('profile/subscribers', [PublishSubscriberController::class, 'subscribers'])->name('profile.subscribers');
Route::get('profile/{id}/edit', [SubscriberFizikController::class, 'editProfile'])->name('profile.edit');
Route::put('profile/update/{id}', [SubscriberFizikController::class, 'updateProfile']);

// Registration
Route::get('login', [SubscriberFizikController::class, 'login'])->name('login');
Route::get('register', [SubscriberFizikController::class, 'register'])->name('register');
Route::post('register', [SubscriberFizikController::class, 'customRegister'])->name('custom.register');
Route::post('login', [SubscriberFizikController::class, 'customLogin'])->name('custom.login');
Route::get('logout', [SubscriberFizikController::class, 'logout'])->name('logout');

// Publish Subscriber url
Route::post('publishsubscriber', [PublishSubscriberController::class, 'publishSubscriber']);
Route::post('profile/subscribers', [PublishSubscriberController::class, 'updateIsSubscriberController'])->name('updateIsSubscriberController');


// Upress Gazeta, Jurnal, Kitob
Route::get('upress/gazeta', [UpressController::class, 'getUpressGazeta'])->name('upress.gazeta');
Route::post('upress/gazeta', [UpressController::class, 'postUpressGazeta']);
Route::get('upress/jurnal', [UpressController::class, 'getUpressJurnal'])->name('upress.jurnal');
Route::post('upress/jurnal', [UpressController::class, 'postUpressJurnal']);
Route::get('upress/kitob', [UpressController::class, 'getUpressKitob'])->name('upress.kitob');
Route::post('upress/kitob', [UpressController::class, 'postUpressKitob']);


// Employes
Route::get('/admin', function () {
    if (session()->has('admin')) {
        return view('employes');
    } else {
        return redirect()->route('admin.login');
    }
});

// Admin Login route
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'adminLogin']);
Route::get('admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::resource('admin/publish', PublishController::class);
Route::resource('admin/publisher', PublisherController::class);
Route::resource('admin/published', PublishedController::class);
Route::resource('admin/article', ArticleController::class);
Route::resource('admin/rubrika', RubrikaController::class);

Route::get('admin/select', [ArticleSelectController::class, 'index'])->name('select.index');
Route::post('admin/select', [ArticleSelectController::class, 'publisherAndPublishedSelect'])->name('article.select');
Route::post('admin/selectPublisher', [ArticleSelectController::class, 'publisherSelect'])->name('publisher.select');
Route::post('admin/selectPublished', [ArticleSelectController::class, 'publishedSelect'])->name('published.select');
Route::get('article/logout', [ArticleSelectController::class, 'articleLogout'])->name('article.logout');

//Pdf Viewers route
Route::get('admin/published/{id}/reader', [PdfReaderController::class, 'pdfReader'])->name('pdfViewer.reader');

// History
Route::get('admin/history', [PublishedController::class, 'history'])->name('history');
Route::put('admin/{id}/history', [PublishedController::class, 'historyUpdate'])->name('history.update');
