@extends('frontend.master')

@section('title')
Teachers Profile || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>OUR TEACHER PROFILE</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Teacher Profile</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->


<!-- Teacher Profile Page  ___________________ -->
<div class="teacher-profile">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 float-right">
                <div class="text-warpper">
                    <h4>BIOGRAPHY</h4>
                    <p class="mmfix">
                        {{$teacher->bio}}
                    </p>

                </div> <!-- /.text-wrapper -->
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 teacher-sidebar float-left wow fadeInUp">
                <div class="img-holder theme-bg-color"><img src="{{asset('thumbnails/'.$teacher->image)}}" alt="Teacher"></div>
                <div class="teachers-bio p-color-bg">
                    <h6>{{$teacher->name}}</h6>
                    <p><i class="fa fa-graduation-cap" aria-hidden="true"></i>{{$teacher->education}}</p>
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href=""><span class="__cf_email__" data-cfemail="">{{$teacher->email}}</span></a></p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="">{{$teacher->phone}}</a></p>
                    <p><i class="fa fa-location-arrow" aria-hidden="true"></i> <a href="">{{$teacher->address}}</a></p>

                    <ul>
                        <li><a href="" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s round-border icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s round-border icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="" class="tran3s round-border icon"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div> <!-- /.teachers-bio -->
            </div> <!-- /.teacher-sidebar -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.teacher-profile -->



<!-- Our Teacher ________________________ -->
<div class="our-teacher wow fadeInUp">
    <div class="container">
        <h4>Our Most Talent Teacher</h4>

        <div class="row">
            <div class="theme-slider">

                @foreach($teachers as $item)
                <div class="item">
                    <div class="item-wrapper theme-bg-color tran3s hvr-float-shadow">
                        <div class="img-holder round-border">
                            <img src="{{asset('thumbnails/'.$item->image)}}" alt="Teacher">
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


@endsection