@extends('layouts.app')

@section('title', 'Add New Academician')

@section('content')
    <h1>Add New Academician</h1>

    <form action="{{ route('academicians.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>

        <div class="mb-3">
            <label for="College" class="form-label">College</label>
            <input type="text" class="form-control" id="College" name="College" required>
        </div>

        <div class="mb-3">
            <label for="Department" class="form-label">Department</label>
            <input type="text" class="form-control" id="Department" name="Department" required>
        </div>

        <div class="mb-3">
            <label for="Position" class="form-label">Position</label>
            <select class="form-control" id="Position" name="Position" required>
                <option value="Professor">Professor</option>
                <option value="Associate Professor">Associate Professor</option>
                <option value="Senior Lecturer">Senior Lecturer</option>
                <option value="Lecturer">Lecturer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Academician</button>
    </form>
@endsection
