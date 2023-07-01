@extends('layouts.admin')

@section('content')
    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>
    <ul>


        <li>Prezzo: {{ $apartment['description'] }}</li>
        <li>Prezzo: {{ $apartment['price'] }}€ a notte</li>
        <li>Metri quadri: {{ $apartment['square_meters'] }}</li>
        <li>Posti letto: {{ $apartment['bad_number'] }}</li>
        <li>Numero di bagni: {{ $apartment['bathroom_number'] }}</li>
        <li>Numero di stanze: {{ $apartment['room_number'] }}</li>

    </ul>
    @if (!$apartment->visibility)
        L'annuncio è ancora da pubblicare
    @else
        L'annuncio è online
    @endif
    <br>
    @if ($apartment->image)
        <img src="{{ asset('storage/' . $apartment->image) }}" alt="immagine">
    @else
        Purtroppo l'immagine non è presente
    @endif
    <br>
    <a class="btn btn-primary mt-4" href="{{ route('admin.apartments.index') }}">Torna indietro</a>
@endsection
