<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnglishController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

//Route::resource('/users', UsersController::class);
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
//     Route::resource('/users', UsersController::class);

// });


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    //Route::get('/', 'HomeController@index')->name('home');
    // Users
    Route::resource('users', UsersController::class);
    // Route::get('users/{user}/destroy', 'UsersController@destroy')->name('users.destroy');
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('chapters', ChapterController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('englishes', EnglishController::class);
});