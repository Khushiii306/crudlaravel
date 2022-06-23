<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\opration;


Route::get('/', function () {
    return view('welcome');
});

Route ::get('home',function(){
    $res = DB::table('ktable')->get();
    session(['row'=>$res]);
    return view('home');
});

 Route::view('form','form');
 Route::view('update','update');

Route::get('insertdata',[opration::class,'insert']);
Route::get('delete/{id}',[opration::class,'delete']);
Route::get('search/{id}',[opration::class,'search']);
Route::get('updatedata',[opration::class,'update']);