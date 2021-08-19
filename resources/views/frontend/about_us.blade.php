@extends('frontend.master')

@section('title')
    About us || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>ABOUT US</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>About</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Welcome Section ___________________________ -->
<div class="welcome-section-two">
    <div class="container">
        <div class="section-title wow fadeInUp">
            <h2 class="p-color">Our Services</h2>
            <h5>awesome success with student</h5>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem </p>
        </div> <!-- /.section-title -->

        <div class="row">
            @foreach($service as $item)
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow fadeInUp">
                <i class="{{$item->icon}}" aria-hidden="true"></i>
                <h3>{{$item->title}}</h3>
                <p>{{$item->summary}}</p>
            </div>
            @endforeach
        </div>
    </div> <!-- /.container -->
</div> <!-- /.welcome-section-two --> <br><br><br>


<!-- course Progress  __________________________ -->
<div class="course-progress">
    <div class="opacity">
        <div class="container">
            <h2>GET 100 COURSES FOR <span class="p-color">FREE</span></h2>
            <p>Tech you how to build a complete learning management system upcoming education for student</p>
            <h6>WE'RE GOOD AT some member</h6>

            <div class="row">
                @foreach($counter as $item)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="icon"> <i class="{{$item->icon}}" style="color:#cd2122;"></i> </div>
                    <p>{{$item->title}}</p>
                    <div class="number"><span class="timer" data-from="0" data-to="{{$item->counts}}" data-speed="1500" data-refresh-interval="5">0</span></div>
                </div>
                @endforeach
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.course-progress -->


<!-- Our Teacher ________________________ -->
<div class="our-teacher wow fadeInUp">
    <div class="container">
        <div class="theme-title">
            <h2>Our teachers</h2>
            <p>Our talent tainer with 10 years experience professional</p>
        </div>

        <div class="row">
            <div class="theme-slider">
                @foreach($teachers as $item)
                <div class="item">
                    <div class="item-wrapper theme-bg-color tran3s hvr-float-shadow">
                        <div class="img-holder round-border">
                            <img src="{{ asset('thumbnails/'.$item->image) }}" alt="Teacher">
                            <div class="overlay round-border tran4s">
                                <ul>
                                    <li><a href="" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="" class="tran3s round-border icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="" class="tran3s round-border icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div> <!-- /.img-holder -->
                        <a href="{{url('teacher-profile', $item->id)}}">
                            <h6>{{$item->name}}</h6>
                        </a>
                        <p>{{$item->post}}</p>
                    </div>
                </div> <!-- /.item -->
                @endforeach
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.our-teacher -->


<!-- Latest Event Slider Section _______ -->
<div class="latest-event-slider event-section wow fadeInUp">
    <div class="container">
        <h3>Latest Events</h3>

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