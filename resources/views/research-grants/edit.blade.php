@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Research Grant</h2>
    <form action="{{ route('research-grants.update', $researchGrant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="project_title">Project Title:</label>
            <input type="text" class="form-control" id="project_title" name="project_title" value="{{ old('project_title', $researchGrant->project_title) }}" required>
        </div>

        <div class="form-group">
            <label for="grant_amount">Grant Amount:</label>
            <input type="number" class="form-control" id="grant_amount" name="grant_amount" value="{{ old('grant_amount', $researchGrant->grant_amount) }}" required>
        </div>

        <div class="form-group">
            <label for="grant_provider">Grant Provider:</label>
            <input type="text" class="form-control" id="grant_provider" name="grant_provider" value="{{ old('grant_provider', $researchGrant->grant_provider) }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $researchGrant->start_date) }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration (Months):</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $researchGrant->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="project_leader_id">Project Leader:</label>
            <select class="form-control" id="project_leader_id" name="project_leader_id" required>
                @foreach ($academicians as $academician)
                    <option value="{{ $academician->id }}" {{ $researchGrant->project_leader_id == $academician->id ? 'selected' : '' }}>{{ $academician->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Research Grant</button>
    </form>
</div>
@endsection
