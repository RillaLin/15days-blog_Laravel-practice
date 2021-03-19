@extends('layouts.app')

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
                        <li class="active">Blog Admin Panel</li>
                    </ol>
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
                <div class="list-group">
                    @foreach($posts as $key=> $post) <!--把每一個post拿出來印-->
                        <a href="#" class="list-group-item">
                            {{$post->title}}
                        </a>
                    @endforeach
                    
                    
                </div>
                
            </div>
        </div>


    </section>

@endsection