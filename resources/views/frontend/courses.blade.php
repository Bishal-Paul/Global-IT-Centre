@extends('frontend.master')

@section('title')
Courses || Global IT Home
@endsection

@section('content')

<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>COURSES LIST</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>COURSES</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->


<div class="course-page-single course-v1">

    <!-- Popular Course _________________________ -->
    <div class="popular-course wow fadeInUp theme-bg-color" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="course-item-wrapper">

                    @foreach($course as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="hvr-float-shadow single-course-item">
                            <div class="img-holder"><img src="{{asset('thumbnails/'.$item->image)}}" alt="Image"></div>
                            <div class="text">
                                <h4><a href="{{url('course-details', $item->title)}}">{{$item->title}}</a></h4>

                                <p>{{$item->summary}}</p>
                                <div class="clear-fix">
                                    <ul class="float-left">
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$contact->location}}</li>
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->created_at->format('d-m-y')}}</li>
                                    </ul>
                                    <a href="{{url('course-details', $item->title)}}" class="tran3s p-color-bg themehover">৳ {{$item->price}}</a>
                                </div>
                            </div> <!-- /.text -->
                        </div>
                    </div> <!-- /.item -->
                    @endforeach

                </div> <!-- /.course-slider -->
            </div> <!-- /.row -->

            <!-- __________________________ Page Indicator __________________ -->
            <div class="page-indicator">
                {{$course->links()}}
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.popular-course -->
</div>

<!-- Latest Event Slider Section _______ -->
<div class="latest-event-slider event-section wow fadeInUp bg-color-fix">
    <div class="container">
        <h3>free Events</h3>
        <div class="row">
            <div class="theme-slider">
                @foreach($event as $item)
                <div class="item wow fadeInUp hvr-float-shadow">
                    <div class="single-event theme-bg-color">
                        <div class="date p-color">{{$item->created_at->format('d')}} <span>{{$item->created_at->format('M')}}</span></div>
                        <a href="{{url('event-details', $item->title)}}">
                            <h6>{{$item->title}}</h6>
                        </a>
                        <p>{!! substr(strip_tags($item->description), 0, 100) !!}</p>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$item->location}}</li>
                        </ul>
                    </div> <!-- /.single-event -->
                </div> <!-- /.item -->
                @endforeach
            </div> <!-- /.theme-slider -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.latest-event-slider -->



@endsection