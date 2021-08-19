@extends('frontend.master')

@section('title')
FAQ || Global IT Home
@endsection

@section('content')
<!-- Inner Page Main Banner __________________ -->
<div class="inner-page-banner">
    <div class="opacity">
        <div class="container">
            <h2>Faq</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<!-- Page Breadcrum __________________________ -->
<div class="page-breadcrum">
    <div class="container">
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>-</li>
            <li>Faq</li>
        </ul>
    </div> <!-- /.container -->
</div> <!-- /.page-breadcrum -->


<!-- Faq Page ____________________________ -->
<div class="faq-page faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInleft">
                <h4>for Courses faq </h4>

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

@endsection