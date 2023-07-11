@extends('layouts.admin')

@section('content')
    @if (Auth::user()->name)
        <h1 class="p-3">Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1 class="p-3">Welcome User</h1>
    @endif
@endsection
