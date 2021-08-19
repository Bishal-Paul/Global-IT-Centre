<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themazine.com/html/edu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 May 2021 07:10:23 GMT -->

<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ url('frontend') }}/images/fav-icon/icon.png">


    <!-- Main style sheet -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('frontend') }}/css/style.css">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontend') }}/css/responsive.css">


    <!-- Fix Internet Explorer ______________________________________-->

    <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="{{ url('frontend') }}/vendor/html5shiv.js"></script>
			<script src="{{ url('frontend') }}/vendor/respond.js"></script>
		<![endif]-->

</head>

<style>
    .popular-course .course-item-wrapper .text p {
        padding: 0px 50px 20px 50px;
    }

    .theme-manage-area .item1 {
        border-right: 2px solid #fff;
        width: 33% !important;
    }

    #logout-form {
        height: 0px !important;
        margin: 0px 25px 0 60px !important;
    }
</style>
@php
use App\Models\Contact;
use App\Models\Course;

$all_course = Course::take(3)->get();
$course = Course::orderBy('id','desc')->get();
$contact = Contact::latest()->take(1)->first();
@endphp

<body>
    <div class="main-page-wrapper">


        <!-- Header _________________________________ -->
        <header class="main-header">


            <div class="top-header">
                <div class="container">
                    <div class="left-side float-left">
                        <ul>
                            <li><span class="icon round-border"><i class="ficon flaticon-signs"></i></span> <a href="#" class="tran3s">{{$contact->location ?? ""}}</a></li>
                            <li><span class="icon round-border"><i class="ficon flaticon-multimedia"></i></span> <a href="#" class="tran3s"><span class="__cf_email__" data-cfemail="71181f171e31141504051412195f121e1c">{{$contact->email ?? ""}}</span></a></li>
                            <li><span class="icon round-border"><i class="ficon flaticon-technology"></i></span> <a href="#" class="tran3s">{{$contact->phone ?? ""}}</a></li>

                        </ul>
                    </div> <!-- /.left-side -->
                    <div class="right-side float-right">
                        <ul>
                            <li><a href="#" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s round-border icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s round-border icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s round-border icon"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> <!-- /.right-side -->
                </div>
            </div> <!-- /.top-header -->

            <!-- _______________________ Theme Menu _____________________ -->

            <div class="container">
                <div class="main-menu-wrapper clear-fix">
                    <div class="container">
                        <div class="logo float-left"><a href="{{url('/')}}" style="vertical-align:middle;"><img src="{{asset('thumbnails/'.$contact->logo ?? '')}}" alt="LOGO"></a></div>

                        <form action="{{url('search')}}" method="GET" class="float-right">
                            <input type="text" name="search" placeholder="Search">
                            <button><i class="fa fa-search-minus" aria-hidden="true"></i></button>
                        </form>

                        <!-- Menu -->
                        <nav class="navbar float-right">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown-holder current-page-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="dropdown-holder"><a href="{{url('about-us')}}">About</a></li>

                                    <li class="dropdown-holder"><a href="{{url('courses')}}">courses</a>
                                        <ul class="sub-menu">
                                            @foreach($course as $item)
                                            <li><a href="{{url('course-details', $item->title)}}" class="tran3s">{{$item->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown-holder"><a href="">features</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('teachers')}}" class="tran3s">Our Teacher</a></li>
                                            <li><a href="{{url('events')}}" class="tran3s">Events</a></li>
                                            <li><a href="{{url('frequently-asked-questions')}}" class="tran3s">faq</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-holder"><a href="{{url('blog')}}">blogs</a></li>
                                    <li><a href="{{url('contact-us')}}">contact</a></li>
                                    <style>
                                        .account p {
                                            padding-top: 37px;
                                            font-size: 14px;
                                            color: #fff;
                                            text-transform: uppercase;
                                            font-weight: 600;
                                            font-family: 'Lato', sans-serif;
                                        }
                                    </style>
                                    <li class="dropdown-holder account">
                                        <p>Account</p>
                                        <ul class="sub-menu">
                                            @if (Route::has('login'))
                                            @auth
                                            @if(Auth::user()->type === 'ADMIN')
                                            <li class="menu-li"><a href="{{url('/admin/dashboard')}}">Admin Dashboard</a></li>
                                            @else
                                            <li class="menu-li"><a href="{{url('/')}}">Dashboard</a></li>
                                            @endif
                                            @endif
                                            @endif
                                            <li><a href="{{url('login')}}">Login</a></li>
                                            <li><a href="{{url('register')}}">Register</a></li>
                                            @if (Route::has('login'))
                                            @auth
                                            <li class="form"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form action="{{route('logout')}}" method="POST" id="logout-form">
                                                @csrf
                                            </form>
                                            @endif
                                            @endif
                                        </ul>

                                    </li>


                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div> <!-- /.main-menu-wrapper -->
            </div>
        </header>





        @yield('content')




        <!-- SubsCribe Banner ___________________ -->
        <div class="subscribe-banner p-color-bg wow fadeInUp">
            <div class="container">
                <h3>Subscribe now</h3>
                <p>Receive weekly newsletter with educational materials, new courses, most popular posts, popular books and much more!</p>
                <form action="#" class="clear-fix">
                    <input type="email" class="float-left wow fadeInLeft" placeholder="Email address">
                    <button class="float-left tran3s wow fadeInRight">Subcribe</button>
                </form>
            </div>
        </div>



        <!-- Footer ______________________________ -->
        <footer>
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-about">
                            <h4>About Global IT Home</h4>
                            <p>Global IT Home Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the sys- tem, and expound the actual teachings of the great explorer</p>
                            <a href="{{url('about-us')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> About us</a>
                            <a href="{{url('teachers')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Team Member</a>
                            <ul>
                                <li><a href="#" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="tran3s round-border icon"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="tran3s round-border icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="tran3s round-border icon"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div> <!-- /.footer-about -->

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 footer-contact">
                            <h4>CONTACT US</h4>
                            <ul>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <a href="" class="tran3s"><span class="__cf_email__" data-cfemail="a1c9c4cdd1cfc4c4c5e1c4c5d4d5c4c2c98fc2cecc">{{$contact->email ?? ""}}</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="tel:{{$contact->phone ?? ''}}" class="tran3s">{{$contact->phone ?? ""}}</a>
                                </li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$contact->location ?? ""}}</li>
                            </ul>
                        </div> <!-- /.footer-contact -->

                        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 footer-quick-link">
                            <h4>Quick link</h4>
                            <ul>
                                <li><a href="{{url('courses')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Our Courses</a></li>
                                <li><a href="{{url('blog')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> News/Blog</a></li>
                                <li><a href="{{url('events')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Event</a></li>
                                <li><a href="{{url('teachers')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Team Member</a></li>
                                <li><a href="{{url('faq')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Privacy Policy</a></li>
                                <li><a href="{{url('faq')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Help</a></li>
                                <li><a href="{{url('contact-us')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Support</a></li>
                                <li><a href="{{url('teachers')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> Teacher</a></li>
                            </ul>
                        </div> <!-- /.footer-quick-link -->

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-event">
                            <h4>Latest Courses</h4>

                            <div id="footer-event-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#footer-event-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#footer-event-carousel" data-slide-to="1"></li>
                                    <li data-target="#footer-event-carousel" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <ul>
                                            @foreach($all_course as $item)
                                            <li>
                                                <div class="date p-color-bg">{{$item->created_at->format('m')}}<span>{{$item->created_at->format('Y')}}</span></div>
                                                <a href="{{url('course-details', $item->title)}}">
                                                    <h6>{{$item->title}}</h6>
                                                </a>
                                                <ul>
                                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$item->created_at->format('d-m-y')}}</li>
                                                    <li><a href="">৳ {{$item->price}}</a></li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div> <!-- /.item -->

                                </div>
                            </div> <!-- /#footer-event-carousel -->
                        </div> <!-- /.footer-event -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.top-footer -->


        </footer>

        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s p-color-bg">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>
        <!-- pre loader  -->
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>


        <!-- Js File_________________________________ -->

        <!-- j Query -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/jquery-2.1.4.js"></script>

        <!-- Bootstrap JS -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- Vendor js _________ -->
        <!-- revolution -->
        <script src="{{ url('frontend') }}/vendor/revolution/jquery.themepunch.tools.min.js"></script>
        <script src="{{ url('frontend') }}/vendor/revolution/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/revolution/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/revolution/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/revolution/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/revolution/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/revolution/revolution.extension.actions.min.js"></script>

        <!-- Google map js -->
        <script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
        <script src="{{ url('frontend') }}/vendor/gmap.js"></script>
        <!-- Bootstrap Select JS -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/bootstrap-select/dist/{{ url('frontend') }}/js/bootstrap-select.js"></script>
        <!-- Time picker -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/time-picker/jquery.timepicker.min.js"></script>
        <!-- WOW js -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/WOW-master/dist/wow.min.js"></script>
        <!-- owl.carousel -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/owl-carousel/owl.carousel.min.js"></script>
        <!-- js count to -->
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/jquery.appear.js"></script>
        <script type="text/javascript" src="{{ url('frontend') }}/vendor/jquery.countTo.js"></script>

        <!-- Theme js -->
        <script type="text/javascript" src="{{ url('frontend') }}/js/theme.js"></script>

    </div> <!-- /.main-page-wrapper -->
</body>

<!-- Mirrored from themazine.com/html/edu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 May 2021 07:12:17 GMT -->

</html>