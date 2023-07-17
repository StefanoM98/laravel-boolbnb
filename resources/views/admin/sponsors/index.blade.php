@extends('layouts.admin')

@section('page-name', 'Sponsor')

@section('content')

    <section id="sponsors_list" class="container py-5">
        <h3 class="my-5 ms_color">Choose the sponsorship plan:</h3>

        <div class="row">
            @forelse($sponsors as $sponsor)
                <div class="col-md-12 col-xxl-4 mb-4">
                    <a href="{{ route('admin.sponsors.show', [$sponsor->id, 'apartment_id' => $apartment_id]) }}">
                        <div
                            class="my-sponsor-card @if ($sponsor->name == 'Bronze') bronze @elseif ($sponsor->name == 'Gold') gold @elseif ($sponsor->name == 'Platinum') platinum @endif">
                            <div class="my-card-header d-flex align-items-center justify-content-between p-3 ">
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
                                <p class="p-2">
                                    Get sponsored for a duration of {{ $sponsor->duration }} h
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <h2>There are no Sponsors</h2>
            @endforelse
        </div>
    </section>

@endsection

<style lang="scss" scoped>
    :root {
        --bronze-color: #543902;
        --gold-color: #d4af37;
        --plat-color: #737373;
        --primary-color: #24ADE3;
    }

    .ms_color {
        color: var(--primary-color)
    }

    .btn_color {
        background-color: var(--primary-color);
        color: white;
        border: var(--primary-color)
    }

    .btn:hover {
        background-color: #1b85ae;
        color: black
    }

    .bronze {
        color: var(--bronze-color);
        box-shadow: 0 0 8px 0 var(--bronze-color), 0 0 20px 0 var(--bronze-color);
    }

    .gold {
        color: var(--gold-color);
        box-shadow: 0 0 8px 0 var(--gold-color), 0 0 20px 0 var(--gold-color);
    }

    .platinum {
        color: var(--plat-color);
        box-shadow: 0 0 8px 0 var(--plat-color), 0 0 20px 0 var(--plat-color);
    }

    .sponsor-show-card {
        max-height: 500px;
    }

    .my-sponsor-card {
        display: flex;
        flex-direction: column;
        background-color: #d7dade;
        min-height: 40px;
        border-radius: 10px;
        cursor: pointer;
        transition: 1s;
        margin: 1rem 0 1rem 0;
    }

    .my-card-header {
        font-family: 'Roboto', sans-serif;
    }

    .my-card-body {
        padding: 2rem;
    }

    #sponsors_list .my-sponsor-card:hover {
        transform: scale(1.05);
    }


    .table.rounded .my-image-container {
        width: 30%;
        margin: 0 auto;
    }

    .my-apartment-card {
        background-color: #3A4A64;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width: 100%;
        text-align: center;
    }

    #sponsor-pay .th {
        color: $primary;
        background-color: #3A4A64;
    }

    #sponsor-pay .td {
        color: $text;
        background-color: #3A4A64;
    }
</style>
