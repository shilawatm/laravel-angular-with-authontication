<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;

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

Route::get('test',[test::class,'index']); 
Route::get('test/{lang}',[test::class,'setlang']);
//Route::get('about','/about');
Route::view('about','/about');
Route::post('save',[test::class,'save']); 
Route::post('update',[test::class,'update']); 
Route::get('/{id}',[test::class,'edit']);
Route::get('delete/{id}',[test::class,'delete']);