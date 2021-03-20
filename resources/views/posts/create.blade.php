@extends('layouts.frontend')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Create Post</h4>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li class="active"><a href="/posts/admin">Blog Admin Panel</a>
                        </li>
                        <li class="active">Create Post</li>
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
        <form method="post" action="/posts">  <!--使用post是因為真的要去資料庫建立一筆資料，action到store的路徑-->
        @csrf <!--連到post、put、delete這些比較危險的method時要做csrf token的驗證-->
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> <!--name之後會傳到後台做判斷-->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>  <!--用onclick塞javascript回到上一頁-->
        </form>
    </div>
</div>


    
@endsection