@extends('frontend.master')

@section('title')
Blogs || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>OUR BLOG</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Blog</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Latest News ___________________________ -->
<div class="latest-news wow fadeInUp theme-bg-color blog-v1">
    <div class="container">
        <div class="post-wrapper row">
            @foreach($blog as $item)
            <div class="single-post wow fadeInUp col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="img-holder">
                    <div class="date wow fadeInUp p-color-bg">{{$item->created_at->format('m')}} <span>{{$item->created_at->format('Y')}}</div>
                    <img src="{{asset('thumbnails/'.$item->image)}}" alt="Image">
                    <a href="{{url('blog-details', $item->title)}}" class="tran4s"></a>
                </div>
                <div class="text-wrapper">
                    <div class="text tran4s">
                        <a href="{{url('blog-details', $item->title)}}">{{$item->title}}</a>
                        <p>{!! substr(strip_tags($item->description), 0, 100) !!}</p>
                    </div> <!-- /.text -->
                </div> <!-- /.text-wrapper -->
            </div> <!-- /.single-post -->
            @endforeach
        </div> <!-- /.post-wrapper -->
    </div> <!-- /.container -->
</div> <!-- /.latest-news -->



@endsection