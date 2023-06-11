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
Route::get('/post/{id?}', function (string $id = null, string $commentid = null ) {
    if($id){
        return "Post id ".$id." Comment id: ".$commentid;
       }else{
        return "No Id ";
       }
})->whereNumber('id');

Route::redirect("/test","/post");
Route::prefix("page")->group(function(){
    Route::get("about",function(){
        return "<h2>About Page</h2>";
    });
    Route::get("gallery",function(){
        return "<h2>Gallery Page</h2>";
    });
});

Route::fallback(function(){
    return "<h1>Page Not Foubd</h1>";
});