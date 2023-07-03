@extends('layouts.admin')

@section('content')


    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>


    <div class="tomtom">
        <h3 class="mb-4">Map:</h3>
        <div id="map" style="width: 100%; height: 300px"></div>
    </div>


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
                {{ $service->name }}{{ $loop->last ? '.' : ', ' }}
            @empty
            @endforelse
        </li>
    </ul>
    @if ($apartment->image)
        <figure class="w-50">
            <img class="w-50" src="{{ asset('storage/' . $apartment->image) }}" alt="immagine">
        </figure>
    @else
        No image!
    @endif
    <br>
    @if (!$apartment->visibility)
        The announcement is yet to be published
    @else
        The announcement is online
    @endif
    <br>
    <a class="btn btn-primary mt-4" href="{{ route('admin.apartments.index') }}">Back to your apartments</a>
    <script>
            let center = [{{ $apartment->longitude }}, {{ $apartment->latitude }}];
        
            const map = tt.map({
                key: "q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ",
                container: "map",
                center: center,
                zoom: 10
            });
            map.on('load', () => {
                new tt.Marker()
                    .setLngLat(center)
                    .addTo(map);
            })
    </script>
@endsection
