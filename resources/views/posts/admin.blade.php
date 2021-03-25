@extends('layouts.app')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Blog Admin Panel</h4>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Admin </li>
                    </ol>
</nav>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

@endsection

@section('content')
    <section class="body-content ">

        <div class="page-content">
            <div class="container">
                <div class="clearfix toolbox">  <!--預防靠右浮動出畫面外-->
                    <a href="/posts/create" class="btn btn-primary pull-right">creat post</a>  <!--新建按鈕，連結到create表單的頁面-->
                </div>
                
                <!--使用bootstrate 3.3.7版本bootstrate的group list-->
                <ul class="list-group">
                    @foreach($posts as $key=> $post) <!--把每一個post拿出來印-->
                        <li href="/posts/show/{{ $post->id }}" class="list-group-item"> <!--改為ul，a裡面放a會出錯-->
                            <div class="float-left">
                                <div class="title">{{$post->title}}</div>
                                @if(isset($post->category)) <small class="d-block text-muted">{{$post->category->name}}</small> @endif <!--category有設定的話才去印，d-block換行，text-muted字換顏色-->
                                <small class="author">{{$post->user->name}}</small> <!--透過關聯性找到user model，並找到名字-->
                            </div>
                            
                            <div class="float-right">  <!--浮右-->
                                <a href="/posts/show/{{ $post->id }}" class="btn btn-secondary">View</a>
                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger" onclick="deletePost({{$post->id}})">Delete</button> <!--把後端id塞到前端-->
                            </div>
                        </li>
                    @endforeach
                    
                    
                </ul>
                
            </div>
        </div>


    </section>

    <form id="delete-form" action="/posts/id" method="post">
        <input type="hidden" name="_method" value="delete">
        @csrf
    </form>

@endsection

