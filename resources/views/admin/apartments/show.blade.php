@extends('layouts.admin')

@section('content')
    <div class="d-flex ">
        <a class="btn btn-primary my-4 " href="{{ route('admin.apartments.index') }}">Back to your
            apartments</a>
    </div>
    <div class="d-flex flex-row-reverse">
        @if ($apartment->sponsored == false)
                <div>
                    <a href="{{ route('admin.sponsors.index', ['apartment_id' => $apartment->id]) }}"
                        class="btn btn-success ms-3">
                        Get sponsor
                    </a>
                </div>
            @else
                <span class="ms-3 fs-4 fw-bold text-success">
                    SPONSORIZED
                </span>
            @endif
    </div>
    <div class="d-flex flex-row-reverse">
        @if ($apartment->visibility == false)
                <div>
                    <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                        class="btn btn-success ms-3">
                        Publish
                    </a>
                </div>
            @else
                <span class="ms-3 fs-4 fw-bold text-success">
                    Published
                </span>
            @endif
    </div>
    <div class="container">
        <h1>{{ $apartment->name }}</h1>
        <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>
    </div>


    <div class="tomtom container">
        <h3 class="mb-4">Map <i class="fa-solid fa-map-location-dot" style="color: #24ADE3;"></i> :</h3>
        <div id="map" style="width: 100%; height: 500px"></div>
    </div>
    <div class="container mt-5 mb-2 ">
        <ul class="list-group list-group-flush" >
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="boldser">Description:</span>{{ $apartment['description'] }}</li>
                <li class="list-group-item bg-light"><span class="boldser" >Price:</span>{{ $apartment['price'] }}€ per night</li>
                <li class="list-group-item "><span class="boldser" >Square maters:</span>{{ $apartment['square_meters'] }}</li>
                <li class="list-group-item bg-light"><span class="boldser" >Bed number:</span>{{ $apartment['bathroom_number'] }}</li>
                <li class="list-group-item "><span class="boldser" >Room number:</span>{{ $apartment['room_number'] }}</li>
              </ul>
            <li class="list-group-item bg-light " >
                <span class="boldser">Services:</span>
                @forelse ($apartment->services as $service)
                    {{ $service->name }}{{ $loop->last ? '.' : ', ' }}
                @empty
                @endforelse
            </li>
        </ul>
    </div>
<div class="container mt-5">
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
    <div class="mb-3 ">
        @if (!$apartment->visibility)
            The announcement is ready to be published
        @else
            The announcement is online
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
            zoom: 16
        });
        map.on('load', () => {
            new tt.Marker()
                .setLngLat(center)
                .addTo(map);
        })
    </script>

<style lang="scss" scoped> 
.boldser{
    font-weight: 700;
}

#map{
    box-shadow: 3px 3px 8px 3px rgba(0, 0, 0, 0.5);
}

</style>

@endsection
