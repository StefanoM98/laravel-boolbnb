@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-row-reverse">
        <a class="btn btn-primary my-4 " href="{{ route('admin.apartments.index') }}">Back to your
            apartments</a>
    </div>
    <div class="d-flex flex-row-reverse">
        @if ($apartment->sponsored == false)
                <div>
                    <a href="{{ route('admin.sponsors.index', ['apartment_id' => $apartment->id]) }}"
                        class="btn btn-success ms-3">
                        Sponsorizza
                    </a>
                </div>
            @else
                <span class="ms-3 fs-4 fw-bold text-success">
                    SPONSORIZZATO
                </span>
            @endif
    </div>
    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>

    <div class="tomtom">
        <h3 class="mb-4">Map:</h3>
        <div id="map" style="width: 100%; height: 300px"></div>
    </div>

    <ul>
        <li>Description: {{ $apartment['description'] }}</li>
        <li>Price: {{ $apartment['price'] }}€ per night</li>
        <li>Square maters: {{ $apartment['square_meters'] }}</li>
        <li>Bed number: {{ $apartment['bed_number'] }}</li>
        <li>Bathroom number: {{ $apartment['bathroom_number'] }}</li>
        <li>Room number: {{ $apartment['room_number'] }}</li>
        <li>
            Services:
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
        <figure class="w-50 m-0">
            <img class="w-50 border" src="{{ asset('img/Image_not_available.png') }}" alt="immagine">
        </figure>
    @endif
    <br>
    <div class="mb-3">
        @if (!$apartment->visibility)
            The announcement is ready to be published
        @else
            The announcement is online
        @endif
    </div>
    <br>

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
