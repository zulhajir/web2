@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
@endsection
