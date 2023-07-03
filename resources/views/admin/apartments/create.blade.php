@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-col-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create Apartment
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.apartments.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="square_meters">Square Meters</label>
                                <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
                            </div>

                            <div class="form-group">
                                <label for="bed_number">Number of Beds</label>
                                <input type="number" class="form-control" id="bed_number" name="bed_number" value="{{ old('bed_number') }}">
                            </div>

                            <div class="form-group">
                                <label for="bathroom_number">Number of Bathrooms</label>
                                <input type="number" class="form-control" id="bathroom_number" name="bathroom_number" value="{{ old('bathroom_number') }}">
                            </div>

                            <div class="form-group">
                                <label for="room_number">Number of Rooms</label>
                                <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}">
                            </div>

                            <div class="mb-3">
                                <label>Servizi</label>
                    
                                <div class="border rounded p-3">
                                    @foreach ($services as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services[]" value="{{ $item->id }}"
                                                id="services-{{ $item->id }}" @checked(in_array($item->id, old('services', [])))>
                                            <label class="form-check-label" for="services-{{ $item->id }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
                            </div>
{{-- 
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
                            </div>

                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
                            </div> --}}

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                            </div>

                            <div class="form-group">
                                <label for="visibility">Visibility</label>
                                <select class="form-control" id="visibility" name="visibility">
                                    <option value="1" @selected(old('visibility'))>
                                        Visible
                                    </option>
                                    <option value="0" @selected(old('visibility'))>
                                        Hidden
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection