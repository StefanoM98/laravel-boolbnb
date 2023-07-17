@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <a class="btn btn_n my-4 " href="{{ route('admin.apartments.index') }}">Back to your apartments</a>
        <div class="d-flex justify-content-between">
            @if ($apartment->sponsored == false)
                <div>
                    <a href="{{ route('admin.sponsors.index', ['apartment_id' => $apartment->id]) }}" class="btn btn-success">
                        Get sponsor
                    </a>
                </div>
            @else
                <span class="fs-4 fw-bold text-success">
                    SPONSORIZED
                </span>
            @endif
            <div class="ms-auto">
                @if ($apartment->visibility == false)
                    <div>
                        <a href="{{ route('admin.apartments.edit', $apartment->slug) }}" class="btn btn-success">
                            Publish
                        </a>
                    </div>
                @else
                    <span class="fs-4 fw-bold text-success">
                        Published
                    </span>
                @endif
            </div>
        </div>
        <h1>{{ $apartment->name }}</h1>
        <h3>{{ $apartment->city }}, {{ $apartment->address }}, {{ $apartment->state }} </h3>
        @if ($apartment->image)
            <div class="col-12 col-md-8">
                <img class="ms_app_img rounded shadow" src="{{ asset('storage/' . $apartment->image) }}" alt="immagine">
            </div>
        @else
            <img class="ms_app_img rounded shadow" src="{{ asset('img/Image_not_available.png') }}" alt="immagine">
        @endif
        <ul class="list-group my-5 list-group-flush">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="boldser">Description:</span>{{ $apartment['description'] }}</li>
                <li class="list-group-item bg-light"><span class="boldser">Price:</span>{{ $apartment['price'] }}€ per
                    night
                </li>
                <li class="list-group-item"><span class="boldser">Square maters:</span>{{ $apartment['square_meters'] }}
                </li>
                <li class="list-group-item bg-light"><span class="boldser">Bed number:</span>{{ $apartment['bathroom_number'] }}</li>
                <li class="list-group-item"><span class="boldser">Room number:</span>{{ $apartment['room_number'] }}</li>
                <li class="list-group-item bg-light"><span class="boldser">Bathroom number:</span>{{ $apartment['bathroom_number'] }}</li>
            </ul>
            <li class="list-group-item">
                <span class="boldser">Services:</span>
                @forelse ($apartment->services as $service)
                    {{ $service->name }}{{ $loop->last ? '.' : ', ' }}
                @empty
                @endforelse
            </li>
        </ul>

        <div class="tomtom container">
            <h3 class="mb-4">Map <i class="fa-solid fa-map-location-dot" style="color: #24ADE3;"></i> :</h3>
            <div id="map" style="width: 100%; height: 300px"></div>
        </div>
    </div>


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
        .boldser {
            font-weight: 700;
        }

        #map {
            box-shadow: 3px 3px 8px 3px rgba(0, 0, 0, 0.5);
        }

        .ms_app_img {
            width: 100%;
        }

        .btn_n {
            background: #24ADE3;
            color: white;

        }

        .btn:hover {
            background: #1e92bf;
        }
    </style>
@endsection
