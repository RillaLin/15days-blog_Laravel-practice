@extends('layouts.app')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Edit Post</h4>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li class="active"><a href="/posts/admin">Blog Admin Panel</a>
                        </li>
                        <li class="active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

@endsection

@section('content')
<div class="page-content">    <!--再放入原本模板的class中讓畫面間隔更好看-->
    <div class="container">   <!--.container+enter跑出container架構，使畫面置中-->
        <form method="post" action="/posts/{{$post->id}}">  <!--透過網址傳送要更新的文章id到update method-->
        <!--使用post是因為真的要去資料庫建立一筆資料，action到store的路徑-->
            @csrf <!--連到post、put、delete這些比較危險的method時要做csrf token的驗證-->
            <input type="hidden" name="_method" value="put">  <!--把method改成put-->
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}"> <!--name之後會傳到後台做判斷-->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <textarea class="form-control" name="content" id="" cols="80" rows="8">{{$post->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>  <!--用onclick塞javascript回到上一頁-->
        </form>
    </div>
</div>


    
@endsection