@extends('layouts.frontend')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Blog Admin Panel</h4>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li class="Blog Admin Panel"><a href="/posts/admin">Blog</a>
                        </li>
                        <li class="active">Blog Single</li>
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
            <div class="toolbox">
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