<?php

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

//看文章用get就可以了
Route::get('/', function () {   //首頁
    return view('index');
});

Route::get('/about', function () { //關於
    return view('about');
});

Route::get('/contact', function () {  //contact
    return view('contact');
});

Route::get('/posts', function () {  //顯示所有文章的列表
    $posts = [1,2,3,4,5];
    return view('posts.list',['posts'=>$posts]);  //傳入posts變數到list 
});

Route::get('/posts/{id}', function ($id) {  //顯示單篇文章
    return view('posts.show');
});
