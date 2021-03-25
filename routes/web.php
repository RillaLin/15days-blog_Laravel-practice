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

//CRUD
//3 routing :creat / edit /list
//加入middleware->登入後才看得到的頁面，會直接導到登入的頁面
// Route::get('/posts/admin','PostController@admin')->middleware('auth'); 也可一個一個用這個寫法

Route::middleware(['auth'])->group(function(){  
    Route::get('/posts/admin','PostController@admin');  //管理者頁面

    Route::get('/posts/create','PostController@create');  //建立文章的表單，表單送出後連到c(store)，移到前面才不會跑到show函式去執行，因為show的路徑的架構可接受create，但create不能接受show
    Route::get('/posts/show/{post}','PostController@show'); //admin的呈現文章，post傳入文章id
    Route::get('/posts/{post}/edit','PostController@edit'); //修改的表單，表單送出後連到u(update)
    
    Route::post('/posts','PostController@store'); //c->儲存新建立的文章到資料庫
    
    Route::put('/posts/{post}','PostController@update'); //u->更新文章
    Route::delete('/posts/{post}','PostController@destroy'); //d->刪除文章

    Route::resource('categories','CategoryController')->except(['show']);  //crud的method除了r(show)其他都建立，但在controller裡的show還是要手動刪除
});



Route::get('/posts/{post}','PostController@show'); //post透過controller的轉換變成post model，r->顯示文章
Route::get('/posts/category/{category}','PostController@indexWithCategory');
Route::get('/posts','PostController@index');  //把文章首頁設為文章列表




// Route::get('/posts', function () {  //顯示所有文章的列表
//     $posts = [1,2,3,4,5];
//     return view('posts.list',['posts'=>$posts]);  //傳入posts變數到list 
// });

// Route::get('/posts/{id}', function ($id) {  //顯示單篇文章
//     return view('posts.show');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
