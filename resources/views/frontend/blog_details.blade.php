@extends('frontend.master')

@section('title')
    Blog Details || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>OUR BLOG SINGLE</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Blog Details</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Blog Details __________________________ -->
<div class="blog-details-page">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 blog-details-page-content">
                <div class="main-wrapper clear-fix">
                    <div class="img-holder">
                        <div class="date wow fadeInUp p-color-bg">{{$blog->created_at->format('m')}} <span>{{$blog->created_at->format('Y')}}</div>
                        <img src="{{asset('thumbnails/'.$blog->image)}}" alt="Image">
                    </div>
                    <ul class="post-info">
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$blog->created_at->format('M-d-Y')}}</li>
                        <li><i class="fa fa-tags" aria-hidden="true"></i> {{$blog->category}}</li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> Global IT Home</li>
                        <li><i class="fa fa-comments" aria-hidden="true"></i> {{$comment->count()}}</li>
                    </ul>
                    <div class="main-post-content">
                        <h3>{{$blog->title}}</h3>
                        <p>{!! $blog->description !!}</p><br><br>

                        <div class="share-option clear-fix">
                            <h6 class="float-left">Share</h6>
                            <ul class="float-right share-icon">
                                <div class="s9-widget-wrapper" style="padding-top: 20px;"></div>
                                <script id="s9-sdk" async defer content="1cb3111db39f49f18b053734d4717ca1" src="//cdn.social9.com/js/socialshare.min.js"></script>
                            </ul>
                        </div> <!-- /.share-option -->

                        <div class="comment-area wow fadeInUp">
                            <h5>{{$comment->count()}} Comments</h5>
                            @foreach($comment as $item)
                            <div class="single-comment theme-bg-color wow fadeInUp">
                                <p>{{$item->name}}</p>
                                <p>{{$item->message}}</p>
                            </div> <!-- /.single-comment -->
                            @endforeach

                        </div> <!-- /.comment-area -->

                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{session('success')}}.
                        </div>
                        @endif

                        <div class="leave-comment wow fadeInUp">
                            <h5>Leave comments</h5>
                            <p>Your email address will not be published.</p>

                            <form action="{{url('post-blog-comment')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-wrapper">
                                    <div class="row">
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="YOUR NAME" name="name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="email" placeholder="YOUR EMAIL" name="email">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="WEBSITE (if have)">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea placeholder="COMMENT" name="message"></textarea>
                                        </div>
                                    </div>

                                    <button class="tran3s p-color-bg themehover"><i class="fa fa-pencil" aria-hidden="true"></i> Post Comment</button>
                                </div> <!-- /.form-wrapper -->
                            </form>
                        </div> <!-- /.leave-comment -->
                    </div> <!-- /.main-post-content -->
                </div>
            </div> <!-- /blog-details-page-content -->
            <!-- _______________ SideBar ___________________ -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebarOne">
                <div class="wrapper-left">

                    <div class="sidebar-box quick-event-list">
                        <div class="box-wrapper">
                            <h4>More Blogs</h4>
                            <ul>
                                @foreach($all_blogs as $item)
                                <li><a href="{{url('blog-details', $item->title)}}" class="tran3s"><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.quick-event-list -->


                    <div class="sidebar-box feature-event feature-course-sidebar">
                        <div class="box-wrapper">
                            <h4>Featured courses</h4>

                            @foreach($course as $item)

                            <div class="single-event clear-fix">
                                <div class="date float-left p-color-bg">
                                    {{$item->created_at->format('m')}} <span>{{$item->created_at->format('Y')}}</span>
                                </div> <!-- /.date -->
                                <div class="post float-left">
                                    <a href="{{url('course-details', $item->title)}}" class="tran3s">{{$item->title}}</a>
                                    <ul>
                                        <li><i class="fa fa-money" aria-hidden="true"></i>{{$item->price}}</li>
                                    </ul>
                                </div> <!-- /.post -->
                            </div> <!-- /.single-event -->

                            @endforeach

                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.feature-event.feature-course-sidebar -->

                    <div class="sidebar-box feature-event">
                        <div class="box-wrapper">
                            <h4>Featured events</h4>
                            @foreach($events as $item)
                            <div class="single-event clear-fix">
                                <div class="date float-left p-color-bg">
                                    {{$item->created_at->format('m')}} <span>{{$item->created_at->format('Y')}}</span>
                                </div> <!-- /.date -->
                                <div class="post float-left">
                                    <a href="{{url('event-details', $item->title)}}" class="tran3s">{{$item->title}}</a>
                                    <ul>
                                        <li><i class="fa fa-tag" aria-hidden="true"></i>{{$item->location}}</li>
                                    </ul>
                                </div> <!-- /.post -->
                            </div> <!-- /.single-event -->
                            @endforeach
                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.feature-event -->
                </div> <!-- /.wrapper -->
            </div> <!-- /.sidebarOne -->
        </div>
    </div> <!-- /.container -->
</div> <!-- /.blog-details-page -->

@endsection