@extends('layouts.admin')

@section('content')
    {{-- @include('partials.session_message') --}}
    <h1 class="text-center mt-2 text-danger"> My Apartments list</h1>
    <div class="text-center m-4">
        <a class="btn btn-success text-center" href="{{ route('admin.apartments.create') }}">NEW APARTMENT</a>
    </div>


    <table class="table">
        <thead class="text-danger">
            <tr>
                <th scope="col" class="col-2">Name</th>
                <th scope="col" class="col-4">City</th>
                <th scope="col" class="col-4">Address</th>
                <th scope="col" class="col-3">Price</th>
                <th scope="col" class="col-3"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($apartments as $apartment)
                <tr class="text-capitalize">
                    <td>{{ $apartment->name }}</td>
                    <td>{{ $apartment->city }}</td>
                    <td>{{ $apartment->address }}</td>
                    <td>{{ $apartment->price }}€</td>
                    <td>
                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}" class="btn btn-success m-2">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning m-2" href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        {{-- <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-delete m-2  " onclick="return confirmDelete()">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form> --}}

                    </td>



                </tr>
            @endforeach

        </tbody>
    </table>
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
