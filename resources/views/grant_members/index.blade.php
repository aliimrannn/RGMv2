@extends('layouts.app')

@section('title', 'Project Members')

@section('content')
    <div class="container">
        <h1>Project Members</h1>
        <p><strong>Project Title:</strong> {{ $project->ProjectTitle }}</p>

        <a href="{{ route('grantmembers.create', $project->GrantID) }}" class="btn btn-primary mb-3">Add Member</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($project->members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->Name }}</td>
                        <td>{{ $member->Position }}</td>
                        <td>{{ $member->Email }}</td>
                        <td>
                            <form action="{{ route('grantmembers.destroy', [$project->GrantID, $member->StaffID]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No members added to this project yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-secondary">Back to Project</a>
    </div>
@endsection
