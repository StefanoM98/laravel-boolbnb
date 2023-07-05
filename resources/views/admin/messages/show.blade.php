@extends('layouts.admin')

@section('content')
    <div class="container pt-3">
        <div class="d-flex flex-row-reverse">
            <a class="btn btn-primary my-4 " href="{{ route('admin.messages.index') }}">Back to your
                other messages</a>
        </div>
        <h4>Message by {{ $message->email }}</h4>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $message->name }}</h5>

                <p class="card-text">{{ $message->text }}</p>
                <p class="card-text">Sent at: {{ $message->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
