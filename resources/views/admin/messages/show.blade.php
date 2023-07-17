@extends('layouts.admin')

@section('content')
    <div class="container pt-4 text-center">
        <h4 class="my-4 p_color">Message by {{ $message->email }} </h4>
        <div class="card justify-content-center my-4">
            <div class="card-header d-flex justify-content-center">
                <h5 class="card-title">{{ $message->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $message->text }}</p>
            </div>
            <div class="card-footer">
                <p class="card-text">Sent at: {{ $message->created_at }}</p>
            </div>
        </div>
        <a href="mailto:{{ $message->email }}?subject=Informations%20apartments:%20'{{ $apartment['name'] }}'"
            class="btn btn_color">Answer</a>
    </div>
    <style lang="scss" scoped>
        :root {
            --primary-color: #24ADE3
        }

        .p_color {
            color: var(--primary-color)
        }
        .btn_color {
            background-color: var(--primary-color);
            color: white
        }
        .btn:hover {
            background-color: #1b85ae;
            color: black
        }
    </style>
@endsection
