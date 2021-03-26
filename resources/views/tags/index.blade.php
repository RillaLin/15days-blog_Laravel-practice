@extends('layouts.app')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Tag Admin Panel</h4>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tag Admin Panel</li>
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
                    <a href="/categories/create" class="btn btn-primary pull-right">creat category</a>  <!--新建按鈕，連結到create表單的頁面-->
                </div>
                
                <!--使用bootstrate 3.3.7版本bootstrate的group list-->
                <ul class="list-group">
                    @foreach($tags as $key=> $tag) <!--把每一個post拿出來印-->
                        <li class="list-group-item clearfix"> <!--改為ul，a裡面放a會出錯-->
                            <div class="float-left">
                                <div class="title">{{$category->name}}</div>
                            </div>
                            
                            <div class="float-right">  <!--浮右-->
                                <button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">Delete</button> <!--把後端id塞到前端-->
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

