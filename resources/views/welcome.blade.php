@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 rounded-3">
        <div class="container py-5">
            <div>
                <img src="{{ asset('img/bnb.png') }}" alt="">
            </div>
            <h1 class="display-5 fw-bold">
                Welcome to Booking Apartments
            </h1>

            <p class="col-md-8 fs-4">We present the brand new service to search for renters. Once you have entered the
                platform, you can enter your accommodations. All you need to do is enter the name of your property, the
                street and normally also the price and the system will do everything it needs to put it online on a special
                site where the customer can see and rent your home.</p>

        </div>
    </div>


    <style>
        img {
            width: 30%;
            height: 60%;
        }
    </style>
@endsection
