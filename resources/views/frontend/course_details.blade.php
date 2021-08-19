@extends('frontend.master')

@section('title')
Course Details || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>COURSES SINGLE</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Course Details</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Course Section _______________________ -->
<div class="course-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="course-details-content clear-fix">
                    <div class="img">
                        <img src="{{asset('thumbnails/'.$course->image)}}" alt="Image" width="100%">
                        <span class="p-color-bg">৳ {{$course->price}}</span>
                    </div>
                    <h3>{{$course->title}}</h3>

                    <ul class="post-info">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$contact->location}}</li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$course->created_at->format('d-M-Y')}}</li>
                    </ul>

                    <div class="sub-text">
                        <h4>COURSE DESCRIPTION</h4>
                        <p>
                            {!! $course->description !!}
                        </p>
                    </div> <!-- /.sub-text -->

                    <div class="faq-page faq">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInleft">
                                    <br><br><br>
                                    <h4>Frequently Asked Questions </h4>

                                    <!-- ________________ Panel _______________ -->
                                    <div class="faq_panel">
                                        <div class="panel-group theme-accordion" id="accordion">
                                            @foreach($faq as $item)
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}">
                                                            {{$item->question}}</a>
                                                    </h6>
                                                </div>
                                                <div id="collapse{{$item->id}}" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <p>{{$item->answer}}</p>
                                                    </div>
                                                </div>
                                            </div> <!-- /panel 1 -->
                                            @endforeach
                                        </div> <!-- end #accordion -->
                                    </div> <!-- End of .faq_panel -->

                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.container -->
                    </div> <!-- /.faq-page -->

                    <div class="sub-text clear-fix wow">
                        <h6 class="float-left">Share</h6>
                        <ul class="float-right share-icon">
                            <ul class="float-right share-icon">
                                <div class="s9-widget-wrapper" style="padding-top: 30px;"></div>
                                <script id="s9-sdk" async defer content="1cb3111db39f49f18b053734d4717ca1" src="//cdn.social9.com/js/socialshare.min.js"></script>
                            </ul>
                        </ul>
                    </div> <!-- /.sub-text -->
                    <a href="#" class="take-course-button tran3s">Take this course NOW</a>
                </div> <!-- /.course-details-content -->
            </div> <!-- /.col- -->
            <!-- _________________ SideBar _________________ -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebarOne">
                <div class="wrapper-left">
                    <div class="sidebar-box quick-event-list">
                        <div class="box-wrapper">
                            <h4>Latest Events</h4>
                            <ul>
                                @foreach($event as $item)
                                <li><a href="{{url('event-details', $item->title)}}" class="tran3s"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.quick-event-list -->

                    <div class="sidebar-box feature-event feature-course-sidebar">
                        <div class="box-wrapper">
                            <h4>Featured courses</h4>
                            @foreach($courses as $item)
                            <div class="single-event clear-fix">
                                <div class="date float-left p-color-bg">
                                    {{$item->created_at->format('m')}}<span>{{$item->created_at->format('Y')}}</span>
                                </div> <!-- /.date -->
                                <div class="post float-left">
                                    <a href="{{url('course-details', $item->title)}}" class="tran3s">{{$item->title}}</a>
                                    <p>{!! substr(strip_tags($item->summary), 0, 50) !!}</p><br>
                                    <ul>
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->created_at->format('d-m-y')}}</li>
                                        <li><a href="">৳ {{$item->price}}</a></li>
                                    </ul>
                                </div> <!-- /.post -->
                            </div> <!-- /.single-event -->
                            @endforeach

                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.feature-event.feature-course-sidebar -->

                </div> <!-- /.wrapper -->
            </div> <!-- /.sidebarOne -->
        </div>
    </div>
</div>



@endsection