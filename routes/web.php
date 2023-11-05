<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

Route::get('/test', function () {
    return view('welcome');
})->name("login");

Route::middleware('keycloak-web')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get("/user", function (Request $request) {
        //return  Auth::hasRole('foo-role'); //we get roles only in that way for now
        dd($request->user());
        return response()->json($request->user());
    });


    Route::get('/login-success', function () {
        return 'Login Success';
    });
});


Route::get('/logout-sucess', function () {
    return 'Logout Success';
});
