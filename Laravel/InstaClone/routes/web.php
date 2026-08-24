<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;


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

// session-2 Task-5
Route::get('/offers/today', function () {
    return "Today's Offers";
})->name('today.offers');

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

// session-3 Task-2     ,3,4
Route::get('/top-songs', [PlaylistController::class, 'showTopSongs']);


// session-4 Task-1
Route::get('/home', function () {
    return view('home', ['name' => 'Ritu Sathwara']);
});

// session-4 Task-2
Route::get('/playlist', function () {
    return view('playlist');
});
// session-4 Task-3

Route::get('/offers', function () {
    $discount = 25;

   return view('offers', ['discount' => $discount]);
});

// session-4 Task-4
Route::get('/deals', function () {
    return view('deals');
});

// session-4 Task-5
Route::get('/home', function () {
    return view('home');
});

Route::get('/playlist', function () {
    return view('playlist');
});

// session-5 Task-1
Route::get('/playlist/create', [PlaylistController::class, 'create']);

// session-5 Task-2
Route::get('/restaurant/create', [RestaurantController::class, 'create']);

Route::post('/restaurant', [RestaurantController::class, 'store']);  // Task-3

// session-5 Task-4,Task-5
Route::get('/playlist/create', [PlaylistController::class, 'create']);

Route::post('/playlist', [PlaylistController::class, 'store']);

// session-7 Task-4
//session-8 Task-4 
Route::get('/playlist/latest', [PlaylistController::class, 'latestPlaylists']);

//session-7 Task-5
Route::get('/playlist/bollywood', [PlaylistController::class, 'bollywood']);

//session-9 Task-2
Route::get('/playlist', [PlaylistController::class, 'index']);

//session-9 Task-3
Route::get('/playlist/update/{id}', [PlaylistController::class, 'updatePlaylist']);

//session-9 Task-4
Route::get('/playlist/delete/{id}', [PlaylistController::class, 'deletePlaylist']);

// session-10 Task-2 routes/api.php
Route::get('/playlist/{id}/songs', [PlaylistController::class, 'songs'])
    ->name('playlist.songs');

//session-10 Task-4

Route::get('/playlist', [PlaylistController::class, 'index']);

//session-11 Task-1

Route::get('/playlist/create', [PlaylistController::class, 'create']);

Route::post('/playlist', [PlaylistController::class, 'store']);

//session-11 Task-3
Route::get('/events/create', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

//session-11 Task-5
Route::get('/playlist', [PlaylistController::class, 'index']);

Route::get('/playlist/create', [PlaylistController::class, 'create']);

Route::post('/playlist', [PlaylistController::class, 'store']);

//session-12 Task-1
Route::get('/profile', [ProfileController::class, 'show']);
Route::post('/profile/upload', [ProfileController::class, 'upload']);

//session-12 Task-2
Route::post('/profile/upload', [ProfileController::class, 'upload']);


//session-12 Task-4
Route::get('/profile', function () {
    return view('profile');
});

Route::post('/profile/upload', [ProfileController::class, 'upload']);

//session-12 Task-5
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

//sessin-14 Task-1
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::middleware(['auth'])->prefix('my-orders')->group(function () {

    Route::get('/', function () {
        return 'My Orders Page';
    })->name('myorders.index');

    Route::get('/pending', function () {
        return 'Pending Orders';
    })->name('myorders.pending');

    Route::get('/completed', function () {
        return 'Completed Orders';
    })->name('myorders.completed');
});

//session-14 Task-2
// Protected Dashboard
// Show Login Page
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Handle Login Form Submission
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        return redirect()->intended('/playlist');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->middleware('guest');

Route::get('/playlist', [PlaylistController::class, 'index'])->middleware('auth');

//session-14 Task-3

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/')->with(
        'success',
        'You have been logged out successfully.'
    );
})->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//session-14 Task-5
Route::middleware(['auth'])->group(function () {

    Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])
        ->name('wishlist.add');

    Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'remove'])
        ->name('wishlist.remove');

});