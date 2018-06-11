@extends('layouts.main')
@section('title')
    Blog
@endsection
@section('content')

    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="breadcrumbs-title pull-left">
                        <h3>{{$post->title}}</h3>
                    </div>
                    <div class="breadcrumbs-list pull-right">
                        <ul>
                            <li> <a title="Home" href="{{route('index')}}"><span>Home</span></a> <span class="separator">/ </span></li>
                            <li class="contact"> <strong>{{$post->title}}</strong></li></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- blog area start -->
    <div class="blog-page-h single-event-area">
        <div class="container">
            <div class="row">
                <!-- EVENT  START -->
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <!-- SINGLE EVENT  START -->
                    <div class="single-event">
                        <div class="even-item-img">
                            <div class="catitemimage">
                                <a href="#">
                                    <span class="catItemLink"></span>
                                    <img src="{{URL::to($post->thumb)}}" alt="" />
                                </a>
                                <div class="blog-info-block">
									<span class="catItemDateCreated">

										<span class="blog-month">{{$post->created_at->diffForHumans()}}</span>
									</span>
                                    <div class="event-share">
                                        <div class="caTshare">
                                            <i class="fa fa-share"></i>
                                            <span>Share</span>
                                            <ul class="share-menu">
                                                <li class="share-title">Share on</li>
                                                <li><a href="#"><i class="fa fa-facebook"></i>SHARE</a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i>TWEET</a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i>SHARE</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3 class="even-title"><a href="#">{{$post->title}}</a></h3>
                            <div class="tolbar">
                                <span class="author"><i class="fa fa-user"></i>	By <a href="#">Dollar Pharmacy</a></span>
                                <span class="cat-link"><i class="fa fa-folder-open"></i>IN <a href="#">Blog</a></span>
                                <span class="cat-comments author"><i class="fa fa-tag"></i><a href="#">Health Articles </a></span>
                                <span class="star">
								<a href="#">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</a> <span> ({{random_int(1, 20)}} Vote)</span> </span>
                            </div>
                            <div class="single-event-text">
								<span class="text-lg">
								</span>
                                {!! $post->description !!}
                            </div>


                        </div>
                    </div>



                    <!-- SINGLE EVENT  END -->
                </div>
                <!-- EVENT  END -->
                <!-- RIGHT SIDEBAR START -->
                @include('partials.blog_sidebar')
                <!-- RIGHT SIDEBAR END -->
            </div>
        </div>
    </div>
    <!-- blog area end -->

@endsection