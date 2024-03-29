<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

//grouping routes that will only be available when the user is authenticated

Route::group(['middleware' => [
    'auth:sanctum',
    'verified'
]], function () {

    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/contacts', function (){
        return view('user.contacts');
    })->name('contacts');
});
