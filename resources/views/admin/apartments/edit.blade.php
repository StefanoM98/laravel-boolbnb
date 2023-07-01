@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-col-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Apartment
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

                        <form action="{{ route('admin.apartments.update', $apartment->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $apartment->name }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $apartment->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="square_meters">Square Meters</label>
                                <input type="number" class="form-control" id="square_meters" name="square_meters"
                                    value="{{ $apartment->square_meters }}">
                            </div>

                            <div class="form-group">
                                <label for="bed_number">Number of Beds</label>
                                <input type="number" class="form-control" id="bed_number" name="bed_number"
                                    value="{{ $apartment->bed_number }}">
                            </div>

                            <div class="form-group">
                                <label for="bathroom_number">Number of Bathrooms</label>
                                <input type="number" class="form-control" id="bathroom_number" name="bathroom_number"
                                    value="{{ $apartment->bathroom_number }}">
                            </div>

                            <div class="form-group">
                                <label for="room_number">Number of Rooms</label>
                                <input type="number" class="form-control" id="room_number" name="room_number"
                                    value="{{ $apartment->room_number }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $apartment->address }}">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $apartment->city }}">
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state"
                                    value="{{ $apartment->state }}">
                            </div>

                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"
                                    value="{{ $apartment->latitude }}">
                            </div>

                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                    value="{{ $apartment->longitude }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $apartment->price }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    value="{{ $apartment->image }}">
                            </div>

                            <div class="form-group">
                                <label for="visibility">Visibility</label>
                                <select class="form-control" id="visibility" name="visibility">
                                    <option value="1" {{ $apartment->visibility == 1 ? 'selected' : '' }}>Visible
                                    </option>
                                    <option value="0" {{ $apartment->visibility == 0 ? 'selected' : '' }}>Hidden
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
