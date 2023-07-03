@extends('layouts.admin')

@section('content')
    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>


    <div class="tomtom">
        <h3 class="mb-4">Map:</h3>
        <div id="map"></div>
    </div>

    @include('partials.tomtom')

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


    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>


    <script>

        let center = [{{ $apartment->longitude }}, {{ $apartment->latitude }}];

        const map = tt.map({
            key: "q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ",
            container: "map",
            center: center,
            zoom: 12
        });
        map.on('load', () => {
            new tt.Marker()
                .setLngLat(center)
                .addTo(map);
        })
    </script>


    {{-- <script>
        let coordinates = [{{ $apartment->longitude }}, {{ $apartment->latitude }}];

        const map = tt.map({
            key: "q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ",
            container: "map",
            center: coordinates,
            zoom: 15
        });

        map.on('load', function() {
            const marker = new tt.Marker().setLngLat(coordinates).addTo(map);

            const container = document.getElementById('map');
            const containerWidth = container.offsetWidth;
            const containerHeight = container.offsetHeight;

            map.resize();

            map.fitBounds([coordinates], {
                padding: {
                    top: containerHeight / 2,
                    bottom: containerHeight / 2,
                    left: containerWidth / 2,
                    right: containerWidth / 2
                }
            });
        });
    </script> --}}



    <style lang="scss">
        .tomtom{
            width: 80%;
            height: 600px;
            border: 1px solid black
        }

        #map{
            height: 100%
        }

     
               
    </style>
@endsection
