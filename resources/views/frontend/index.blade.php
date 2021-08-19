@extends('frontend.master')

@section('title')
    Global IT Home
@endsection

@section('content')
<!-- Theme Banner ________________________________ -->
<div id="banner">
    <div class="rev_slider_wrapper">
        <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
        <div id="main-banner-slider" class="rev_slider" data-version="5.0.7">
            <ul>
                @foreach($bannar as $item)

                <!-- SLIDE1  -->
                <li data-index="rs-280" data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0" data-saveperformance="off" data-title="Title Goes Here" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('thumbnails/'.$item->image) }}" alt="image" class="rev-slidebg" data-bgparallax="3" data-bgposition="center center" data-duration="20000" data-ease="Linear.easeNone" data-kenburns="on" data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0" data-rotatestart="0" data-scaleend="100" data-scalestart="140">
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption" data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-56','-56','-45','-150']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap;">
                        <h5>{{$item->text}}</h5>
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption" data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" data-y="['middle','middle','middle','middle']" data-voffset="['20','25','30','-85']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap;">
                        <h1>{{$item->title}}</h1>
                    </div>


                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption" data-x="['left','left','left','left']" data-hoffset="['0','25','35','15']" data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','80']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="3000" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="{{url('courses')}}" class="course-button">View courses</a>
                    </div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption" data-x="['left','left','left','left']" data-hoffset="['192','217','227','15']" data-y="['middle','middle','middle','middle']" data-voffset="['205','205','210','155']" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;" data-start="3000" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="{{url('contact-us')}}" class="buy-button p-color-bg">BUY NOW</a>
                    </div>

                </li>

                @endforeach


            </ul>
        </div>
    </div><!-- END REVOLUTION SLIDER -->
</div> <!--  /#banner -->


<!-- Manage Section _________________________ -->
<div class="theme-manage-area">
    <div class="container">
        @foreach($latest_course as $item)
        <div class="item-part float-left item1 p-color-bg">
            <h3><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$item->title}}</h3>
            <p>{{$item->summary}}</p>
            <a href="{{url('course-details', $item->title)}}" class="tran3s">Rede more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
        @endforeach
    </div> <!-- /.container -->
</div> <!-- /.theme-manage-area --> <br><br><br><br><br>


<!-- Welcome Section ___________________________ -->
<div class="welcome-section">
    <div class="container">
        <div class="section-title wow fadeInUp">
            <h2 class="p-color">Services we provide</h2>
            <h5>awesome success with student</h5>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem </p>
        </div> <!-- /.section-title -->

        <div class="row">
            @foreach($service as $item)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInUp">
                <h3><i class="{{$item->icon}}" aria-hidden="true"></i> {{$item->title}}</h3>
                <p>{{$item->summary}}</p>
            </div>
            @endforeach
        </div>
    </div> <!-- /.container -->
</div> <!-- /.welcome-section -->



<!-- Popular Course _________________________ -->
<div class="popular-course wow fadeInUp theme-bg-color">
    <div class="container">
        <h2>OUR COURSES</h2>

        <div class="row">
            <div class="theme-slider course-item-wrapper">
                @foreach($course as $item)
                <div class="item hvr-float-shadow">
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
                </div> <!-- /.item -->
                @endforeach
            </div> <!-- /.course-slider -->
        </div>
    </div> <!-- /.container -->
</div> <!-- /.popular-course -->


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



<!-- Event Section _______________________ -->
<div class="event-section wow fadeInUp">
    <div class="container">
        <div class="theme-title">
            <h2>Events</h2>
            <p>Our upcoming event you should mind always</p>
        </div>

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



<!-- Information Banner _______________________ -->
<div class="information-banner wow fadeInUp">
    <div class="container">
        <h3>Information for teachers and students, Event information and <span class="p-color">education news</span></h3>
        <h6>ONE OF THE MOST COMPLETE Education THEME</h6>
        <a href="{{url('contact-us')}}" class="p-color-bg tran3s wow fadeInUp">Contact us</a>
    </div> <!-- /.container -->
</div> <!-- /.information-banner -->



<!-- Latest News ___________________________ -->
<div class="latest-news wow fadeInUp theme-bg-color">
    <div class="container">
        <div class="theme-title">
            <h2>latest Blog</h2>
            <p>Something for education news,latest news feed</p>
        </div>

        <div class="post-wrapper row">
            @foreach($blog as $item)
            <div class="single-post wow fadeInUp col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="img-holder">
                    <div class="date wow fadeInUp p-color-bg">{{$item->created_at->format('m')}} <span>{{$item->created_at->format('Y')}}</span></div>
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



<!-- Testimonial And FAQ Section _________________________ -->
<div class="test-faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 testimonial wow fadeInLeft">
                <div class="wrapper">
                    <h3>TESTIMONIALS</h3>
                    <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->


                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="item active">
                                @foreach($testimonial as $item)
                                <div class="single-box theme-bg-color">
                                    <div class="img round-border"><img src="{{asset('thumbnails/'.$item->image)}}" alt="Image"></div>
                                    <h6>{{$item->name}} <span>({{$item->post}})</span></h6>
                                    <p>{{$item->message}}</p>
                                </div> <!-- /.single-box -->
                                @endforeach
                            </div>

                        </div>
                    </div> <!-- /#testimonial-carousel -->
                </div> <!-- /.wrapper -->
            </div> <!-- /.testimonial -->

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 faq wow fadeInRight">
                <div class="wrapper">
                    <h3>Frequently Asked Questions</h3>
                    <!-- ________________ Panel _______________ -->
                    <div class="faq_panel">
                        <div class="panel-group theme-accordion" id="accordion">
                            @foreach($faq as $item)
                            <div class="panel">
                                <div class="panel-heading active-panel">
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
                </div> <!-- /.wrapper -->
            </div> <!-- /.faq -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.test-faq -->
@endsection