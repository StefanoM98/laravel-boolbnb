@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.session_message')
        <h1 class=" my-3  p_color"> My Apartments list</h1>

        <div class="my-4">
            <a class="btn btn_n my-4  text-center" href="{{ route('admin.apartments.create') }}">NEW APARTMENT</a>
        </div>
        @if ($apartments->count() > 0)
            <table class="table align-middle">
                <thead class="text-danger">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" class="d-none d-lg-table-cell">City</th>
                        <th scope="col" class="d-none d-lg-table-cell">Address</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr class="text-capitalize">
                            <td>{{ $apartment->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $apartment->city }}</td>
                            <td class="d-none d-lg-table-cell">{{ $apartment->address }}</td>
                            <td>{{ $apartment->price }}€</td>
                            <td class="">
                                <div class="d-flex justify-content-between align-items-end">
                                    <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                        class="btn btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form class="d-inline-block m-0"
                                        action="{{ route('admin.apartments.destroy', $apartment->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger ms_btn_cancel"
                                            data-title="{{ $apartment->name }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span>
                <p class="text-center fs-2 fw-bold">
                    You have not entered any ads yet
                </p>
            </span>
        @endif

    </div>

    {{-- <div>
        {{ $projects->links() }}
    </div> --}}

    {{-- Script for delete popup --}}
    {{-- <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Project?');
        }
    </script> --}}

    <style lang="scss" scoped>
        .btn_n {
            background: #24ADE3;
            color: white;

        }

        .btn:hover {
            background: #1e92bf
        }

        :root {
            --primary-color: #24ADE3
        }

        .p_color {
            color: var(--primary-color)
        }
    </style>
@endsection
