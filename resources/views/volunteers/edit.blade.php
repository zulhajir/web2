@extends('layouts.app')

@section('content')
    <h1>Edit Volunteer</h1>

    <form action="{{ route('volunteers.update', $volunteer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Volunteer Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $volunteer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $volunteer->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $volunteer->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ $volunteer->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id == $volunteer->event_id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Volunteer</button>
    </form>
@endsection
