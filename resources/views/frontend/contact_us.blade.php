@extends('frontend.master')

@section('title')
Contact Us || Global IT Home
@endsection

@section('content')
<style>
    /* Style inputs with type="text", select elements and textareas */
    input[type=text],
    select,
    textarea {
        width: 100%;
        /* Full width */
        padding: 12px;
        /* Some padding */
        border: 1px solid #ccc;
        /* Gray border */
        border-radius: 4px;
        /* Rounded borders */
        box-sizing: border-box;
        /* Make sure that padding and width stays in place */
        margin-top: 6px;
        /* Add a top margin */
        margin-bottom: 16px;
        /* Bottom margin */
        resize: vertical
            /* Allow the user to vertically resize the textarea (not horizontally) */
    }

    /* Style the submit button with a specific background color etc */
    input[type=submit] {
        background-color: #cd2122;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
        background-color: #cd2122;
    }

    .sidebarOne .sidebar-box .box-wrapper {
        padding: 35px 105px 25px 25px !important;
    }
</style>
<section class="section" style="padding: 250px 0px;">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{session('success')}}.
        </div>
        @endif
        <h2>Contact us</h2><br>

        <form action="{{url('post-contact-us')}}" method="post" style="width: 65%; float:left;">
            @csrf
            <label for="fname">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            <label for="fname">Email</label>
            <input type="text" id="name" name="email" placeholder="Your email..">


            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject">



            <label for="subject">Message</label>
            <textarea id="subject" name="message" placeholder="Write something.." style="height:200px"></textarea>

            <input type="submit" value="Submit">

        </form>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebarOne">
            <div class="wrapper-left">

                <div class="sidebar-box quick-event-list" style="float:right;">
                    <div class="box-wrapper">
                        <h4>Contact Details</h4>
                        <ul>
                            @foreach($contact as $item)
                            <li><a href="" class="tran3s"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$item->email}}</a></li>
                            <li><a href="" class="tran3s"><i class="fa fa-phone-square" aria-hidden="true"></i>{{$item->phone}}</a></li>
                            <li><a href="" class="tran3s"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$item->location}}</a></li>
                            @endforeach
                        </ul>
                    </div> <!-- /.box-wrapper -->
                </div> <!-- /.sidebar-box.quick-event-list -->
            </div> <!-- /.wrapper -->
        </div> <!-- /.sidebarOne -->

    </div>
</section>

@endsection