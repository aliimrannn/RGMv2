@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Grant Provider</th>
                <th>Grant Amount</th>
                <th>Start Date</th>
                <th>Duration (months)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->ProjectTitle }}</td>
                    <td>{{ $project->GrantProvider }}</td>
                    <td>{{ $project->GrantAmount }}</td>
                    <td>{{ $project->StartDate }}</td>
                    <td>{{ $project->Duration }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->GrantID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->GrantID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection