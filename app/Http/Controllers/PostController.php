<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;  //使用post model
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogPost;
use App\Category;
use App\Tag;

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
        //$categories = Category::all();  //取得category的資料
        //$tags = Tag::all();
        return view('posts.index',['posts'=>$posts]);  //去手動新建一個index的php檔，並把資料庫抓到的資料當作參數傳到index

    }

    public function indexWithCategory(Category $category)
    {
        $posts = Post::where('category_id',$category->id)->get();  //找到特定category id的文章
        return view('posts.index',['posts'=>$posts]);
    }

    public function indexWithTag(Tag $tag)
    {
        $posts = $tag->posts;   //用tag去找到相關聯性的文章
        return view('posts.index',['posts'=>$posts]);  //去手動新建一個index的php檔，並把資料庫抓到的資料當作參數傳到index

    }


    public function create()  //到建立文章的表單
    {
        $post = new Post;   //先建立一個新的post model，為了把create跟edit的form做合併到_form.blade.php
        $categories = Category::all();  //取得category的資料
        return view('posts.create',['post'=>$post,'categories'=>$categories]);
    }

    public function store(StoreBlogPost $request)  //request接收create表單送出的資訊
    {
        //用StoreBlogPost接request做驗證

        $post = new Post;   //建立一個新的post model，因為還沒有post
        $post->fill($request->all()); //用fill把request的資料都放進去，但fill不接受request，只接受array，用all()可以把request轉乘array
        $post->user_id=Auth::id(); //取得登入的使用者id
        $post->save();         //存到資料庫

        $tags=explode(',',$request->tags);  //將得到的tags資料用逗號做拆解，並丟到tags array中
        $this->addTagsToPost($tags,$post);  //呼叫函式

        return redirect('/posts/admin');     //用get的路徑回到index首頁
    }

    private function addTagsToPost($tags,$post)
    {
        foreach($tags as $key => $tag){
            //craete / load tag
            $model = Tag::firstOrCreate(['name'=>$tag]);  //如果tag資料庫中已有了就用first讀出來，沒有就create一個，並且回傳一個model給我們，是massassignment的作法，要記得去tag model做fillable的設定
            //connect post & tag
            $post->tags()->attach($model->id); //先找到關聯性再將id做attach，和post的id做關聯性
        }
    }

    public function show(Post $post)
    {
        //if(Auth::check())   //如果是登入狀態
        $categories = Category::all();  //取得category的資料
        return view('posts.show',['post'=>$post,'categories'=>$categories]);
    }

    public function showByAdmin(Post $post)
    {
        return view('posts.showByAdmin',['post'=>$post]);  //傳入post model 變數
    }

    public function edit(Post $post)  //用post承接傳過來的post id
    {
        $categories = Category::all();  //取得category的資料
        return view('posts/edit',['post'=>$post,'categories'=>$categories]);  //傳post model的變數過去
    }

    public function update(StoreBlogPost $request,Post $post)  //用post承接form action傳過來的post id，並找到那篇post，再用request接form傳過來的request，laravel潛規則必須先寫request
    {
        //用StoreBlogPost接request做驗證

        $post->fill($request->all()); //用fill把request的資料都放進去，但fill不接受request，只接受array，用all()可以把request轉乘array
        $post->save();         //更新資料庫

        //remove old tags relationship
        //foreach($tags as $key => $tag){
            //$post->tags()->detach($tag->id); //先把原本的關聯性拿掉
        //}   可直接用下面這一行拿掉所有的關聯性
        $post->tags()->detach();

        $tags=explode(',',$request->tags);  //將得到的tags資料用逗號做拆解，並丟到tags array中
        $this->addTagsToPost($tags,$post);  //呼叫函式

        return redirect('/posts/admin');     //用get的路徑回到index首頁
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts/admin');
    }
}
