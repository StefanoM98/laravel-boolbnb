@extends('layouts.admin')

@section('content')
    {{-- @if (Auth::user()->name)
        <h1 class="p-3">Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1 class="p-3">Welcome User</h1>
    @endif --}}
    {{-- @if (Auth::user()->name)
        <h1 class="p-3">Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1 class="p-3">Welcome User</h1>
    @endif --}}
    <br>
    <br>
    <i class="fa-regular fa-bell fa-xl d-flex justify-content-end mt-5" style="color: #000000;"></i>
    <div class="container bg-white py-4 mt-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome back</h2>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h4>Your reservations</h4>
    </div>
    <div class="container">
      <div class="row">
          <!-- Prima colonna -->
          <div class="col-md-6">
              <button type="button" class="btn btn-outline-dark btn-transparent m-3">Leaving (0)</button>
          </div>
          <!-- Seconda colonna -->
          <div class="col-md-6">
              <button type="button" class="btn btn-outline-dark btn-transparent m-3">People hosted at the moment (0)</button>
          </div>
      </div>
  </div>
  
    <div class="container oggidomani bg-light">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center">
                <i class="fa-solid fa-paper-plane" style="color: #000000;"></i>
                <h4>No guests leaving today or tomorrow</h4>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h4> Apartments</h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100">40%</div>
                </div>
                <p>Apartments available : 40%</p>
            </div>
            <div class="col">
                <h4> Reservations</h4>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">75%</div>
                </div>
                <p>Reservations made : 75%</p>
            </div>
            <div class="col">
                <h4> Occupation</h4>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100">60%</div>
                </div>
                <p>Current occupation: 60%</p>
            </div>
        </div>
    </div>

    <style>
        /* CARD FOR SPONOR  */
        .plan-card {
            background: #fff;
            width: 15rem;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 10px;
            padding-bottom: 20px;
            border-radius: 10px;
            border-bottom: 4px solid #000446;
            border: 2px solid #0DCAF0;
            box-shadow: 0 6px 30px rgba(207, 212, 222, 0.3);
            font-family: "Poppins", sans-serif;
        }

        .plan-card h2 {
            margin-bottom: 15px;
            font-size: 27px;
            font-weight: 600;
        }

        .plan-card h2 span {
            display: block;
            margin-top: -4px;
            color: #4d4d4d;
            font-size: 12px;
            font-weight: 400;
        }

        .benefits-list {
            margin-top: 16px;
        }

        .benefits-list ul {
            padding: 0;
            font-size: 14px;
        }

        .benefits-list ul li {
            color: #4d4d4d;
            list-style: none;
            margin-bottom: .2rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .benefits-list ul li svg {
            width: .9rem;
            fill: currentColor;
        }

        .benefits-list ul li span {
            font-weight: 300;
        }

        .button-get-plan {
            display: flex;
            justify-content: center;
            margin-top: 1.2rem;
        }

        .button-get-plan a {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0DCAF0;
            color: black;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: .8rem;
            letter-spacing: .05rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .button-get-plan a:hover {
            transform: translateY(-3%);
            box-shadow: 0 3px 10px rgba(207, 212, 222, 0.9);
        }

        .button-get-plan .svg-rocket {
            margin-right: 10px;
            width: .9rem;
            fill: currentColor;
        }

        /* FINISH CARD FOR SPONOR  */

        /* CARD FOR PAY */
        .oggidomani {
            height: 300px;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .plan-card {
                width: 100%;
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        @media (max-width: 576px) {
            .plan-card {
                width: 100%;
                padding-left: 10px;
                padding-right: 10px;
            }

            .oggidomani {
              height: 300px;
            }
        }
          @media (max-width: 768px) {
            .col-md-6 {
              flex: 0 0 100%;
              max-width: 100%;
            }
          }


    </style>
@endsection


