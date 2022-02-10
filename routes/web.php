<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\PublishedController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\PublishSubscriberController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberFizikController;
// use App\Http\Controllers\WelcomeController;
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
Route::post('search', [SearchController::class, 'search']); 
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


// Employes
Route::resource('employes/publish', PublishController::class);
Route::resource('employes/publisher', PublisherController::class);
Route::resource('employes/published', PublishedController::class);
Route::resource('employes/article', ArticleController::class);


