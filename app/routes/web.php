<?php

use Illuminate\Support\Facades\Route;
Illuminate\Support\Facades\Response;

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
})->name('welcome');

Route::get('/validPg', function () {
    return view('validPg');
})->name('validPg');

Auth::routes();
Route::get('/message/{id_vendeur}/{id_annonce}',[ App\Http\Controllers\MessageController::class,'create'])->name('create');
Route::POST('/message', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');
Route::get('/index',[ App\Http\Controllers\MessageController::class,'index'])->name('index');
Route::delete('/annonce/{annonce}',[App\Http\Controllers\ControlAnnonce::class, 'delete'])->name('delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/annonce', [App\Http\Controllers\ControlAnnonce::class, 'create'])->name('annonce');
Route::POST('/rechercher', [App\Http\Controllers\ControlAnnonce::class, 'rechercher'])->name('rechercher');
Route::get('/affiche',[App\Http\Controllers\ControlAnnonce::class,'index'])->name('affiche');
Route::POST('/annonce/create', [App\Http\Controllers\ControlAnnonce::class, 'store'])->name('store');
Route::get('/monannonce/{id}', [App\Http\Controllers\ControlAnnonce::class, 'monannonces'])->name('monannonces');

Route::get('/annonce/edit/{id}',[App\Http\Controllers\ControlAnnonce::class,'edit'])->name('edit');
Route::post('/annonce/update/{id}',[App\Http\Controllers\ControlAnnonce::class,'update'])->name('update');
