@extends('layouts.app')

@section('title', 'Search Projects')

@section('content')
    <div class="container">
        <h1>Search Projects</h1>

        <form action="{{ route('projects.search') }}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="search" class="form-label">Search by Project Title or Grant Provider</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @if(isset($projects))
            <h2 class="mt-4">Search Results</h2>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Grant Provider</th>
                        <th>Start Date</th>
                        <th>Duration (months)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->ProjectTitle }}</td>
                            <td>{{ $project->GrantProvider }}</td>
                            <td>{{ \Carbon\Carbon::parse($project->StartDate)->format('d M, Y') }}</td>
                            <td>{{ $project->Duration }} months</td>
                            <td>
                                <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>
@endsection
