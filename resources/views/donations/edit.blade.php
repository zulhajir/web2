@extends('layouts.app')

@section('content')
    <h1>Edit Donasi</h1>

    <form action="{{ route('donations.update', $donation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="donor_name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="donor_name" name="donor_name" value="{{ $donation->donor_name }}" required>
        </div>

        <div class="mb-3">
            <label for="donor_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="donor_email" name="donor_email" value="{{ $donation->donor_email }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $donation->amount }}" required>
        </div>

        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id == $donation->event_id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Donasi</button>
    </form>
@endsection
