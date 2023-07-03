@extends('layouts.admin')

@section('content')
    {{-- @include('partials.session_message') --}}
    <h1 class="text-center mt-2 text-danger"> My Apartments list</h1>
    <div class="text-center m-4">
        <a class="btn btn-success text-center" href="{{ route('admin.apartments.create') }}">NEW APARTMENT</a>
    </div>

    @if ($apartments->count() > 0)
        <table class="table align-middle">
            <thead class="text-danger">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($apartments as $apartment)
                    <tr class="text-capitalize">
                        <td>{{ $apartment->name }}</td>
                        <td>{{ $apartment->city }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>{{ $apartment->price }}€</td>
                        <td class="d-flex justify-center align-items-center">
                            <div>
                                <a href="{{ route('admin.apartments.show', $apartment->slug) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                
                                <form class="d-inline-block" action="{{ route('admin.apartments.destroy', $apartment->slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                
                                    <button type="submit" class="btn btn-danger ms_btn_cancel" data-title="{{$apartment->name}}">
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
                Non ci sono ancora appartamenti 
            </p>
        </span>
    @endif
    {{-- <div>
        {{ $projects->links() }}
    </div> --}}

    {{-- Script for delete popup --}}
    {{-- <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Project?');
        }
    </script> --}}
@endsection
