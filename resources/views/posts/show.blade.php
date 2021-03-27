@extends('layouts.frontend')

@section('page-title')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Blog Single</h4>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li class="active"><a href="/posts">Blog</a>
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
            <div class="row">
                <div class="col-md-8">
                    <!--classic image post-->
                    <div class="blog-classic">
                        <div class="blog-post">
                            <div class="full-width">
                                @if(!$post->thumbnail)
                                    <img src="/assets/img/post/p12.jpg" alt="" />    <!--預設圖片-->
                                @else
                                    <img width="320" src="{{$post->thumbnail}}" alt="thumbnail">
                                @endif
                            </div>
                            <h4 class="text-uppercase"><a href="blog-single.html">{{$post->title}}</a></h4>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>posted by <a href="#">{{$post->user->name}}</a>
                                </li>
                                @if($post->category)
                                    <li><i class="fa fa-folder-open"></i>  <a href="/posts/category/{{$post->category_id}}">{{$post->category->name}}</a>
                                    </li>
                                @endif
                                <li><i class="fa fa-comments"></i>  <a href="#">{{$post->comments->count()}} comments</a>
                                </li>
                            </ul>

                            <p>{{$post->content}}</p>

                            <div class="blog-post">
                                <blockquote class="quote-post">
                                    <p>
                                        Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error
                                    </p>
                                </blockquote>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis deleniti dignissimos ea enim iste laboriosam nihil omnis possimus quia, tempora, totam voluptatibus! Animi consectetur dolor in laboriosam
                                unde.</p>

                            
                            <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>


                            <div class="inline-block">
                            @if($post->tags->count()>0)  <!--如果有tag資料在印出tag-->
                                <div class="widget-tags">
                                    <h6 class="text-uppercase">Tags </h6>
                                    @foreach($post->tags as $key => $tag)
                                        <a href="/posts/tag/{{$tag->id}}">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            @endif
                            </div>


                            <div class="clearfix inline-block m-top-50 m-bot-50">
                                <h6 class="text-uppercase">Share this Post </h6>
                                <div class="widget-social-link circle">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>


                            <div class="pagination-row">

                                <div class="pagination-post">
                                    <div class="prev-post">
                                        <a href="#">
                                            <div class="arrow">
                                                <i class="fa fa-angle-double-left"></i>
                                            </div>
                                            <div class="pagination-txt">
                                                <span>Previous Post</span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="post-list-link">
                                        <a href="#">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>

                                    <div class="next-post">
                                        <a href="#">
                                            <div class="arrow">
                                                <i class="fa fa-angle-double-right"></i>
                                            </div>
                                            <div class="pagination-txt">
                                                <span>Next Post</span>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                            </div>


                            <!--comments discussion section start-->

                            <div class="heading-title-alt text-left heading-border-bottom">
                                <h4 class="text-uppercase">{{ $post->comments->count() }} Comments</h4>
                            </div>

                            <ul class="media-list comments-list m-bot-50 clearlist">

                                <!-- Comment Item start-->
                                @foreach($post->comments as $key=>$comment)
                                    <li class="media">

                                        <a class="pull-left" href="#">
                                            <img class="media-object comment-avatar" src="/assets/img/post/a1.png" alt="" width="50" height="50">
                                        </a>

                                        <div class="media-body">

                                            <div class="comment-info">
                                                <div class="comment-author">
                                                    <a href="#">{{ $comment->user->name }}</a>
                                                </div>
                                                {{$comment->created_at->format('F d,Y, G:i')}}
                                                <a href="#"><i class="fa fa-comment-o"></i>Reply</a>
                                            </div>

                                            <p>
                                                {{$comment->comment}}
                                            </p>

                                        </div>

                                    </li>
                                @endforeach
                                
                                <!-- End Comment Item -->

                            </ul>

                            <!--comments discussion section end-->

                            <!--comments  section start-->

                            <div class="heading-title-alt text-left heading-border-bottom">
                                <h4 class="text-uppercase">Leave a Comments</h4>
                            </div>
                            
                            <!--若表單驗證出現問題，傳回錯誤訊息的位置-->
                            @if($errors->any())    <!--用any確認是否有錯誤訊息-->
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $key=>$error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form method="post" action="/comments" id="form" role="form" class="blog-comments">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">  <!--偷傳post_id過去，user_id不用，因為可以直接取得-->
                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <!-- Name -->
                                        @if(Auth::check())  <!--如果有登入，自動幫我們輸入名字-->
                                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" value="{{Auth::user()->name}}">
                                        @else
                                            <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100">
                                        @endif
                                    </div>

                                    <!-- Comment -->
                                    <div class="form-group col-md-12">
                                        <textarea name="comment" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                    </div>

                                    <!-- Send Button -->
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-small btn-dark-solid ">
                                            Send comment
                                        </button>
                                    </div>


                                </div>

                            </form>

                            <!--comments  section end-->



                        </div>
                    </div>
                    <!--classic image post-->

                </div>
                <div class="col-md-4">
                    @include('posts._sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection