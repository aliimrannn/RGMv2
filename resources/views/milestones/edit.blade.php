@extends('layouts.app')

@section('title', 'Edit Milestone')

@section('content')
    <div class="container">
        <h1>Edit Milestone</h1>

        <form action="{{ route('milestones.update', [$project->GrantID, $milestone->MilestoneID]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="MilestoneName" class="form-label">Milestone Name</label>
                <input type="text" name="MilestoneName" id="MilestoneName" class="form-control" value="{{ $milestone->MilestoneName }}" required>
            </div>

            <div class="mb-3">
                <label for="TargetCompletionDate" class="form-label">Target Completion Date</label>
                <input type="date" name="TargetCompletionDate" id="TargetCompletionDate" class="form-control" value="{{ $milestone->TargetCompletionDate }}" required>
            </div>

            <div class="mb-3">
                <label for="Deliverable" class="form-label">Deliverable</label>
                <textarea name="Deliverable" id="Deliverable" class="form-control" rows="4" required>{{ $milestone->Deliverable }}</textarea>
            </div>

            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <select name="Status" id="Status" class="form-select" required>
                    <option value="Pending" {{ $milestone->Status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ $milestone->Status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $milestone->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Remarks" class="form-label">Remarks</label>
                <textarea name="Remarks" id="Remarks" class="form-control" rows="3">{{ $milestone->Remarks }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Milestone</button>
            <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
