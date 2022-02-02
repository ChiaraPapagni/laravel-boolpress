<?php

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PageController@index')->name('home');

Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::get(
    'categories/{category:slug}/posts',
    'CategoryController@posts'
)->name('categories.posts');

Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('tags.posts');

Auth::routes();

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::resource('posts', PostController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('contacts', ContactController::class)->only([
            'index',
            'show',
            'destroy',
        ]);
    });

Route::get('contacts', 'ContactController@show_contact_page')->name('contacts');
Route::post('contacts', 'ContactController@store')->name('contacts.send');

Route::get('/blog', function () {
    return view('guest.blog.index');
});