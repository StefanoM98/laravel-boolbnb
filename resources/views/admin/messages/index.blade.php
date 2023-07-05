@extends('layouts.admin')
@section('content')
    <div class="container pt-3">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Apartment</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">Sent at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->apartment->name }}</td>
                            <td>{{ ucfirst($message->name) }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->text }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>No messages!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
