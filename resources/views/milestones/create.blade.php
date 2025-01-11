@extends('layouts.app')

@section('title', 'Create Milestone')

@section('content')
    <div class="container">
        <h1>Create Milestone</h1>

        <form action="{{ route('milestones.store', $project->GrantID) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="MilestoneName" class="form-label">Milestone Name</label>
                <input type="text" name="MilestoneName" id="MilestoneName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="TargetCompletionDate" class="form-label">Target Completion Date</label>
                <input type="date" name="TargetCompletionDate" id="TargetCompletionDate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Deliverable" class="form-label">Deliverable</label>
                <textarea name="Deliverable" id="Deliverable" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Milestone</button>
            <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
