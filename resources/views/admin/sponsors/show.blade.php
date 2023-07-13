@extends('layouts.admin')

@section('page-name', 'Sponsorizza appartamento')

@section('content')

    <div class="container pt-5">
        @include('partials.session_message')
    </div>

    <section class="container">

        <h3 class="mt-5 text-center text-primary">Buy a sponsor for your apartment</h3>

        <div id="sponsor_show" class="container h-100">
            <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-5">
                {{-- SE non arriva appartamento dalla show --}}
                @if (isset($apartments))
                    @if (count($apartments) > 0)
                        <div class="col-xs-12 col-xl-4 d-flex align-items-start justify-content-center">
                            <div class="my-sponsor-card">
                                <div
                                    class="my-card-header d-flex align-items-center justify-content-between p-3">
                                    <h4>
                                        {{ $sponsor->name }}</h4>

                                    <span class="sponsor-price fs-3">
                                        € {{ $sponsor->price }}
                                    </span>
                                </div>
                                <div class="my-card-body">
                                    <p>
                                        {{ $sponsor->description }}
                                    </p>
                                </div>
                                <div class="my-card-footer text-end">
                                    <p class="text-muted p-2">
                                        Get sponsored for a duration of {{ $sponsor->duration }} h
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- tabella appartamenti --}}
                        <div class="col-xs-12 col-xl-8 d-flex justify-content-center align-items-center">
                            <table id="sponsor-pay" class="table ">
                                {{-- HEAD --}}
                                <thead>
                                    <tr>
                                        <th scope="col" class="d-none text-center d-md-table-cell p-3">
                                            <i class="bi bi-camera-fill"></i>
                                        </th>
                                        <th scope="col" class="p-3">
                                            <i class="bi bi-bookmark-fill"></i>
                                        </th>
                                        <th scope="col" class="d-none d-lg-table-cell p-3">
                                            <i class="bi bi-map-fill"></i>
                                        </th>
                                        <th scope="col" class="text-center text-warning p-3">
                                            <i class="bi bi-star-fill"></i>
                                        </th>
                                    </tr>
                                </thead>
                                {{-- BODY --}}
                                @foreach ($apartments as $apartment)
                                    <tbody>
                                        <tr>
                                            <td class="d-none d-md-table-cell align-middle text-center">
                                                <div class="my-image-container">
                                                    <img src="{{ asset('storage/' . $apartment->image) }}"
                                                        alt=" {{ $apartment->name }}" class="img-fluid rounded">
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                {{ $apartment->name }}
                                            </td>
                                            <td class="d-none d-lg-table-cell align-middle">
                                                {{ $apartment->address }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{-- QUI REINDIRIZZEREI ALLA STESSA route() CHE GESTISCE IL PAGAMENTO NEL CASO DELL'APPARTAMENTO RICEVUTO --}}
                                                <a href="{{ route('admin.payment.clientToken', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}"
                                                    class="btn btn-warning">
                                                    Paga
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{-- SE array $apartments vuoto --}}
                    @else
                        <div class="col">
                            <div class="d-flex justify-content-center align-items-center fs-4 mt-5">
                                <p>No apartments found</p>
                            </div>
                        </div>
                    @endif
                @else
                    {{-- SE mi arriva appartamento dalla show --}}
                    <div class="col-sm-12 col-md-6 d-flex justify-content-center sponsor-show-card">
                        <div class="my-sponsor-card">
                            <div
                                class="my-card-header d-flex align-items-center justify-content-between p-3">
                                <h4>
                                    {{ $sponsor->name }}</h4>

                                <span class="sponsor-price fs-3">
                                    € {{ $sponsor->price }}
                                </span>
                            </div>
                            <div class="my-card-body">
                                <p>
                                    {{ $sponsor->description }}
                                </p>
                            </div>
                            <div class="my-card-footer text-end">
                                <p class="text-warning p-2">
                                    Get sponsored for a duration of {{ $sponsor->duration }} h
                                </p>
                                <div>
                                    <a href="{{ route('admin.sponsors.index') }}" class="btn btn-primary m-3">
                                        Go back to sponsor's page
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-12 col-md-6 d-flex justify-content-center sponsor-show-card">
                        <div class="my-apartment-card">
                            <h2 class="text-center px-2">{{ $apartment->name }}</h2>
                            <div class="px-5">
                                <img class="img-fluid rounded" src="{{ asset('storage/' . $apartment->image) }}">
                            </div>

                            {{-- Rotta payment --}}
                            <div class="text-center my-3">
                                <a href="{{ route('admin.payment.clientToken', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id, 'slug' => $apartment->slug]) }}"
                                    class="btn btn-success">
                                    Complete payment process
                                </a>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>

    </section>

@endsection