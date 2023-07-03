@extends('layouts.admin')

@section('content')
    <h1 class="p-3">Ciao {{ Auth::user()->name }}</h1>
@endsection
