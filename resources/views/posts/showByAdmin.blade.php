@extends('layouts.app')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Blog Admin Panel</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="/posts/admin">Blog</a>
                        </li>
                        <li class="breadcrumb-item active">Blog Single</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <h1>{{ $post -> title }}</h1>
            <small class="author">{{$post->user->name}}</small> <!--透過關聯性找到user model，並找到名字-->
            <div class="toolbox text-left mt-3">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                <button class="btn btn-danger" onclick="deletePost({{$post->id}})">Delete</button> 
            </div>
            <div class="content">
                {{ $post -> content }}
            </div>
        </div>
    </div>

    <form id="delete-form" action="/posts/id" method="post">
        <input type="hidden" name="_method" value="delete">
        @csrf
    </form>

@endsection