@extends('layouts.app')

@section('title', 'Edit Academician')

@section('content')
    <h1>Edit Academician</h1>

    <form action="{{ route('academicians.update', $academician->StaffID) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ $academician->Name }}" required>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ $academician->Email }}" required>
        </div>

        <div class="mb-3">
            <label for="College" class="form-label">College</label>
            <input type="text" class="form-control" id="College" name="College" value="{{ $academician->College }}" required>
        </div>

        <div class="mb-3">
            <label for="Department" class="form-label">Department</label>
            <input type="text" class="form-control" id="Department" name="Department" value="{{ $academician->Department }}" required>
        </div>

        <div class="mb-3">
            <label for="Position" class="form-label">Position</label>
            <select class="form-control" id="Position" name="Position" required>
                <option value="Professor" {{ $academician->Position == 'Professor' ? 'selected' : '' }}>Professor</option>
                <option value="Associate Professor" {{ $academician->Position == 'Associate Professor' ? 'selected' : '' }}>Associate Professor</option>
                <option value="Senior Lecturer" {{ $academician->Position == 'Senior Lecturer' ? 'selected' : '' }}>Senior Lecturer</option>
                <option value="Lecturer" {{ $academician->Position == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Academician</button>
    </form>
@endsection
