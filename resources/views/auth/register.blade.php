@extends('frontend.master')
@section('title')
Register | Global IT Home
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

    .form-control {
        height: 45px !important;
        margin-bottom: 20px;
    }
</style>

<x-jet-validation-errors class="mb-4" />

<section class="section" style="padding: 250px 0px;">
    <div class="container">

        <form action="{{ route('register') }}" method="post" style="width: 60%; margin-left: 225px;">
            @csrf
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." :value="old('name')" required autofocus autocomplete="name">

            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Your email.." :value="old('email')" required>

            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required autocomplete="new-password">

            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Register">

        </form>


    </div>
</section>
@endsection