@extends('layouts.app')
@section('content')
    <div class="jumbotron mb-4 rounded-3">
        <div class="container my-5">
            <div class="d-flex justify-content-center mb-5">
                <img class="welcome_img" src="{{ asset('img/bnb.png') }}" alt="">
            </div>
            <h1 class="display-5 fw-bold text-center">
                Welcome to Booking Apartments
            </h1>

            <p class="fs-4 text-center">We present the brand new service to search for renters. Once you have entered the
                platform, you can enter your accommodations. All you need to do is enter the name of your property, the
                street and normally also the price and the system will do everything it needs to put it online on a special
                site where the customer can see and rent your home.
            </p>

        </div>
    </div>


    <style>
        .welcome_img {
            width: 250px;
        }
    </style>
@endsection
