@extends('frontend.master')

@section('title')
Events || Global IT Home
@endsection

@section('content')

<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>Event</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Event</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->



<!-- Event Section _______________________ -->
<div class="event-section wow fadeInUp">
    <div class="container">
        <div class="row">
            @foreach($event as $item)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp hvr-float-shadow">
                <div class="single-event theme-bg-color">
                    <div class="date p-color">{{$item->created_at->format('d')}} <span>{{$item->created_at->format('M')}}</span></div>
                    <a href="{{url('event-details', $item->title)}}">
                        <h6>{{$item->title}}</h6>
                    </a>
                    <p>{!! substr(strip_tags($item->description), 0, 100) !!}</p>
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$item->location}}</li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->organizer}}</li>
                    </ul>
                </div> <!-- /.single-event -->
            </div>
            @endforeach
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.event-section -->


@endsection