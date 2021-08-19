@extends('frontend.master')

@section('title')
Event Details || Global IT Home
@endsection

@section('content')

<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>Events SINGLE</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Event Details</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Event Section _______________________ -->
<div class="event-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 float-right">
                <div class="event-details-content clear-fix">
                    <img src="{{asset('thumbnails/'.$event->image)}}" alt="Image">
                    <h3>{{$event->title}}</h3>

                    <div class="sub-text">
                        <h4>EVENT DESCRIPTION</h4>
                        <p>{{$event->description}}</p>
                    </div> <!-- /.sub-text -->
                    <div class="sub-text">
                        <h4>EVENT OUTPUT</h4>
                        <p>{{$event->output}}</p>

                    </div> <!-- /.sub-text -->
                    <div class="sub-text">
                        <h4>Location/map</h4>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;{{$event->location}}</p>

                    </div> <!-- /.sub-text -->

                    <div class="sub-text">
                        <h4>ORGANIZER</h4>
                        <p>{{$event->organizer}}</p>

                    </div> <!-- /.sub-text -->
                    <hr>
                    <div class="sub-text clear-fix">
                        <h6 class="float-left">Share</h6>
                        <ul class="float-right share-icon">
                            <div class="s9-widget-wrapper" style="padding-top: 30px;"></div>
                            <script id="s9-sdk" async defer content="1cb3111db39f49f18b053734d4717ca1" src="//cdn.social9.com/js/socialshare.min.js"></script>
                        </ul>
                    </div> <!-- /.sub-text -->
                </div> <!-- /.event-details-content -->
            </div> <!-- /.col- -->
            <!-- _________________ SideBar _________________ -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebarOne float-left">
                <div class="wrapper">
                    <div class="sidebar-box quick-event-list">
                        <div class="box-wrapper">
                            <h4>Recent Events</h4>
                            <ul>
                                @foreach($all_event as $item)
                                <li><a href="{{url('event-details', $item->title)}}" class="tran3s"><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- /.box-wrapper -->
                    </div> <!-- /.sidebar-box.quick-event-list -->

                    <div class="sidebar-box feature-event">
                        <div class="box-wrapper">
                            <h4>Featured Courses</h4>
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
                    </div> <!-- /.sidebar-box.feature-event -->


                </div> <!-- /.wrapper -->
            </div> <!-- /.sidebarOne -->
        </div>
    </div>
</div>


@endsection