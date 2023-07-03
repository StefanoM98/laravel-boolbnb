@extends('layouts.admin')

@section('content')
    <h1>Ciao {{ Auth::user()->name }}</h1>
@endsection
