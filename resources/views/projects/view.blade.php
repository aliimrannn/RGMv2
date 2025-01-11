@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <div class="container">
        <h1>Project Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->ProjectTitle }}</h5>
                <p class="card-text"><strong>Grant Provider:</strong> {{ $project->GrantProvider }}</p>
                <p class="card-text"><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->StartDate)->format('d M, Y') }}</p>
                <p class="card-text"><strong>Duration:</strong> {{ $project->Duration }} months</p>
                <p class="card-text"><strong>Project Leader:</strong> {{ $project->projectLeader->Name }}</p>
                <p class="card-text"><strong>Project Members:</strong> 
                    @foreach($project->members as $member)
                        {{ $member->Name }}@if(!$loop->last), @endif
                    @endforeach
                </p>

                <h3 class="mt-4">Project Milestones</h3>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Milestone Name</th>
                            <th>Target Completion Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->milestones as $milestone)
                            <tr>
                                <td>{{ $milestone->MilestoneName }}</td>
                                <td>{{ \Carbon\Carbon::parse($milestone->TargetCompletionDate)->format('d M, Y') }}</td>
                                <td>{{ $milestone->Status }}</td>
                                <td>{{ $milestone->Remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('projects.edit', $project->GrantID) }}" class="btn btn-primary">Edit Project</a>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
                </div>
            </div>
        </div>
    </div>
@endsection
