@extends('layouts.app')

@section('title', 'Add New Project')

@section('content')
    <h1>Add New Project</h1>

    <form action="{{ route('projects.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="ProjectTitle" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="ProjectTitle" name="ProjectTitle" required>
        </div>

        <div class="mb-3">
            <label for="GrantProvider" class="form-label">Grant Provider</label>
            <input type="text" class="form-control" id="GrantProvider" name="GrantProvider" required>
        </div>

        <div class="mb-3">
            <label for="GrantAmount" class="form-label">Grant Amount</label>
            <input type="number" class="form-control" id="GrantAmount" name="GrantAmount" required>
        </div>

        <div class="mb-3">
            <label for="StartDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="StartDate" name="StartDate" required>
        </div>

        <div class="mb-3">
            <label for="Duration" class="form-label">Duration (Months)</label>
            <input type="number" class="form-control" id="Duration" name="Duration" required>
        </div>

        <button type="submit" class="btn btn-success">Save Project</button>
    </form>
@endsection