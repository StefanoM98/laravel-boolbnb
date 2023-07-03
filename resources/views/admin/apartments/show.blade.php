@extends('layouts.admin')

@section('content')
    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>
    <ul>
        <li>Description: {{ $apartment['description'] }}</li>
        <li>Price: {{ $apartment['price'] }}€ a notte</li>
        <li>Square maters: {{ $apartment['square_meters'] }}</li>
        <li>Bed number: {{ $apartment['bed_number'] }}</li>
        <li>Bathroom number: {{ $apartment['bathroom_number'] }}</li>
        <li>Room number: {{ $apartment['room_number'] }}</li>
        <li>
            Servizi: 
            @forelse ($apartment->services as $service)
                {{$service->name}}{{ $loop->last ? '.' : ', '}}
            @empty
                
            @endforelse
        </li>
    </ul>
    @if (!$apartment->visibility)
        The announcement is yet to be published
    @else
        The announcement is online
    @endif
    <br>
    @if ($apartment->image)
        <img src="{{ asset('storage/' . $apartment->image) }}" alt="immagine">
    @else
        No image!
    @endif
    <br>
    <a class="btn btn-primary mt-4" href="{{ route('admin.apartments.index') }}">Back to your apartments</a>
@endsection
