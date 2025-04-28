@extends('layouts.app')

@section('content')
    <h1>Volunteers</h1>
    
    <!-- Tombol untuk menambah volunteer baru -->
    <a href="{{ route('volunteers.create') }}" class="btn btn-primary my-3">Add Volunteer</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Events</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volunteers as $volunteer)
                <tr>
                    <td>{{ $volunteer->name }}</td>
                    <td>{{ $volunteer->email }}</td>
                    <td>{{ $volunteer->phone }}</td>
                    <td>{{ $volunteer->event->name }}</td>
                    <td>
                        <a href="{{ route('volunteers.edit', $volunteer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('volunteers.destroy', $volunteer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
