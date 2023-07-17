@extends('layouts.admin')
@section('content')
    <div class="container pt-3">
        <h1 class="p_color">Messages</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Apartment</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sent at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->apartment->name }}</td>
                            <td>{{ ucfirst($message->name) }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-success position-relative">
                                    <i class="fa-solid fa-eye"></i> 
                                    @if ($message->state_message == false)
                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    @endif
                                </a>
                            </td>

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

    <style lang="scss" scoped >
                :root {
        --primary-color: #24ADE3
    }

    .p_color {
        color: var(--primary-color)
    }
    </style>
@endsection
