@extends('layouts.app')

@section('content')
    <h1>Donations</h1>
    
    <!-- Tombol untuk menambah donation baru -->
    <a href="{{ route('donations.create') }}" class="btn btn-primary my-3">Add Donation</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $donation)
            
                <tr>
                    <td>{{ $donation->donor_name }}</td>
                    <td>{{ $donation->amount }}</td>
                    <th>{{ $donation->event->name }}</th>
                    <td>
                        <a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" style="display:inline;">
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
