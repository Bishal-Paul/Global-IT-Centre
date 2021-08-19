@extends('frontend.master')

@section('title')
Teachers || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
	<div class="opacity">
		<div class="container">
			<h2>Our Teacher</h2>
		</div> <!-- /.container -->
	</div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>-</li>
			<li>Teachers</li>
		</ul>
	</div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->


<!-- Our Teacher ________________________ -->
<div class="our-teacher wow fadeInUp our-teacher-single-page">
	<div class="container">
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