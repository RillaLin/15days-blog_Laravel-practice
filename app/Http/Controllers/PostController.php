<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;  //使用post model

class PostController extends Controller
{
    //fun+enter跳出function架構
    public function admin()  //到管理文章的列表
    {
        $posts = Post::all();   //用post model把post資料表的資料都撈出來
        return view('posts.admin',['posts'=>$posts]);
    }

    public function index()   //文章首頁的列表
    {
        $posts = Post::all();   //用post model把post資料表的資料都撈出來
        return view('posts.index',['posts'=>$posts]);  //去手動新建一個index的php檔，並把資料庫抓到的資料當作參數傳到index

    }

    public function create()  //到建立文章的表單
    {
        return view('posts.create');
    }

    public function store(Request $request)  //request接收create表單送出的資訊
    {
        $post = new Post;   //建立一個新的post model
        $post->fill($request->all()); //用fill把request的資料都放進去，但fill不接受request，只接受array，用all()可以把request轉乘array
        $post->save();         //存到資料庫
        return redirect('/posts');     //用get的路徑回到index首頁
    }
}