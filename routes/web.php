<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/auth-info', function () {
    $data = ['success' => false, 'message' => 'no logged in user'];
    if(Auth::user()){
        $data = [ 'success' => true, 'data' => Auth::user() ];
    }

    return response()->json($data);
});

Route::get('/auth/redirect/{driver?}', function ($driver = 'github') {
    return Socialite::driver($driver)->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    $email = $user->getEmail();
    $localUser = User::where('email', $email)->first();

    if(!$localUser){
        $localUser = User::create([
            'email' => $email, 'password' => Hash::make(Str::random()),
        ]);
    }

    Auth::login($localUser);

    return redirect('auth-info');
});
