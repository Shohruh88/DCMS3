<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleSelectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfReaderController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\PublishedController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\PublishSubscriberController;
use App\Http\Controllers\RubrikaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberFizikController;
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

// Search route
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::post('search', [SearchController::class, 'search'])->name('search.search'); 
Route::get('search/{id}', [SearchController::class, 'show']);

// Profile route
Route::get('profile', [SubscriberFizikController::class, 'profile'])->name('profile');  
Route::get('profile/subscribers', [PublishSubscriberController::class, 'subscribers'])->name('profile.subscribers');

// Registration
Route::get('login', [SubscriberFizikController::class, 'login'])->name('login');
Route::get('register', [SubscriberFizikController::class, 'register'])->name('register');
Route::post('register', [SubscriberFizikController::class, 'customRegister'])->name('custom.register');
Route::post('login', [SubscriberFizikController::class, 'customLogin'])->name('custom.login');
Route::get('logout', [SubscriberFizikController::class, 'logout'])->name('logout');

// Publish Subscriber url
Route::post('publishsubscriber', [PublishSubscriberController::class, 'publishSubscriber']);
Route::post('profile/subscribers', [PublishSubscriberController::class, 'updateIsSubscriberController'])->name('updateIsSubscriberController');


// Employes
Route::get('/admin', function() {
    return view('employes');
});
Route::resource('admin/publish', PublishController::class);
Route::resource('admin/publisher', PublisherController::class);
Route::resource('admin/published', PublishedController::class);
Route::resource('admin/article', ArticleController::class);
Route::resource('admin/rubrika', RubrikaController::class);
Route::get('admin/select', [ArticleSelectController::class, 'index']);
Route::post('admin/selectArticle', [ArticleSelectController::class, 'articleSelect'])->name('article.select');
//Pdf Viewers route
Route::get('admin/published/{id}/reader', [PdfReaderController::class, 'pdfReader'])->name('pdfViewer.reader');

