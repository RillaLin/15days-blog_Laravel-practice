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
                <ul class="list-group">
                    @foreach($posts as $key=> $post) <!--把每一個post拿出來印-->
                        <li href="/posts/show/{{ $post->id }}" class="list-group-item clearfix"> <!--改為ul，a裡面放a會出錯-->
                            {{$post->title}}
                            <div class="pull-right">  <!--浮右-->
                                <a href="/posts/show/{{ $post->id }}" class="btn btn-default">View</a>
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

@section('script')  
<script>  //寫javascript
    let deletePost = function(id){
        let result = confirm('Do you want to delete the post?');
        if(result){
            let actionUrl = '/posts/'+id;
            $('#delete-form').attr('action',actionUrl).submit();  //用http方式做刪除
        }
    };
</script>
@endsection