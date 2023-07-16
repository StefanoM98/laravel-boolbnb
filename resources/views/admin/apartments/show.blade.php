@extends('layouts.admin')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="d-flex justify-content-start">
        <a class="btn btn-primary mt-5 mb-3" href="{{ route('admin.apartments.index') }}">Back to your apartments</a>
    </div>
    <div class="d-flex flex-row-reverse mb-2">
        @if ($apartment->sponsored == false)
            <div>
                <a href="{{ route('admin.sponsors.index', ['apartment_id' => $apartment->id]) }}"
                    class="btn btn-success ms-3">
                    Get sponsor
                </a>
            </div>
        @else
            <span class="ms-3 fs-4 mb-1 fw-bold text-success">
                SPONSORIZED
            </span>
        @endif
    </div>
    <div class="d-flex flex-row-reverse">
        @if ($apartment->visibility == false)
            <div>
                <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                    class="btn btn-success ms-3 mb-2">
                    Publish
                </a>
            </div>
        @else
            <span class="ms-3 fs-4 mb-2 fw-bold text-success">
                Published
            </span>
        @endif
    </div>
</div>

<div class="container">
    <h1>{{ $apartment->name }}</h1>
    <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} <i
            class="fa-solid fa-map-pin" style="color: #008799;"></i> </h3>
    <div class="container-fluid">
        <div class="tomtom">
            <h3 class="mb-4">Map:</h3>
            <div id="map" style="width: 100%; height: 300px"></div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-light"><span class="bold">Details</span></li>
        <li class="list-group-item "><span class="bold">Description:</span> {{ $apartment['description'] }}</li>
        <li class="list-group-item bg-light "><span class="bold">Price:</span> {{ $apartment['price'] }}€ per night</li>
        <li class="list-group-item  "><span class="bold">Square meters:</span> {{ $apartment['square_meters'] }}</li>
        <li class="list-group-item bg-light "><span class="bold">Bed number:</span> {{ $apartment['bed_number'] }}</li>
        <li class="list-group-item  "><span class="bold">Bathroom number:</span> {{ $apartment['bathroom_number'] }}</li>
        <li class="list-group-item bg-light "><span class="bold">Room number:</span> {{ $apartment['room_number'] }}</li>
        <li class="list-group-item bg-light "><span class="bold">Services:</span>
            @forelse ($apartment->services as $service)
                {{ $service->name }}{{ $loop->last ? '.' : ', ' }}
            @empty
            @endforelse
        </li>
    </ul>
</div>
<div class="container">
    @if ($apartment->image)
        <figure class="w-100">
            <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}" alt="immagine">
        </figure>
    @else
        <figure class="w-100 m-0">
            <img class="img-fluid border" src="{{ asset('img/Image_not_available.png') }}" alt="immagine">
        </figure>
    @endif
    <br>
    <div class="mb-3">
        @if (!$apartment->visibility)
            The announcement is ready to be published
        @else
            The announcement is online <i class="fa-solid fa-signal online" style="color: #00fb08;"></i>
        @endif
    </div>
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

    <style lang="scss" scoped>
        #map{
            border: 2px solid #008799;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);
        }
        .bold{
            font-weight: 700;
        }
        .online {
animation:1s blinker linear infinite;
color: rgb(0, 187, 6);
font-size:18px;
font-weight:bold;
}
.online a {color:rgb(0, 130, 39);}
@keyframes blinker { 
0% { opacity: 1.0; }
50% { opacity: 0.0; }
100% { opacity: 1.0; }
}

    </style>
@endsection
