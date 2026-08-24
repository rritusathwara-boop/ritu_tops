<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// session-1 Task-3
Route::get('/foodie', function () {
    return 'Welcome to Foodie App';
});

// session-2 Task-1
Route::get('/explore', function () {
    return 'Welcome to Explore Page';
});

// session-2 Task-2
Route::post('/playlist/add', function () {
    return 'Song added to playlist';
});

// session-2 Task-3
Route::get('/user/{username}', function ($username) {
    return 'Profile of ' . $username;
})->where('username', '[A-Za-z]+');

// session-2 Task-4
Route::prefix('settings')->group(function () {

    Route::get('/profile', function () {
        return 'Profile Settings';
    });

    Route::get('/privacy', function () {
        return 'Privacy Settings';
    });

    Route::get('/notifications', function () {
        return 'Notification Settings';
    });

});