@extends('layouts.admin')

@section('page-name', 'Sponsor')

@section('content')

    <div class="container pt-5">
        @include('partials.session_message')
    </div>

    <section id="sponsors_list" class="container py-5">
        <h3 class="mt-5 text-primary">Scegli la sponsorizzazione che preferisci:</h3>

        <div class="row">
            @forelse($sponsors as $sponsor)
                <div class=" col-12 col-md-4">
                    <a href="{{ route('admin.sponsors.show', [$sponsor->id, 'apartment_id' => $apartment_id]) }}">
                        <div class="card">
                            <div
                                class="card-header d-flex align-items-center justify-content-between p-3">
                                <h4>
                                    {{ $sponsor->name }}</h4>

                                <span class="sponsor-price fs-3">
                                    € {{ $sponsor->price }}
                                </span>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $sponsor->description }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p class="p-2">
                                    Sponsorizza per una durata di {{ $sponsor->duration }} ore
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <h2>Non ci sono sponsor</h2>
            @endforelse
        </div>
    </section>

@endsection