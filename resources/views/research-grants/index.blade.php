@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Research Grants</h2>

    <a href="{{ route('research-grants.create') }}" class="btn btn-success mb-3">Create New Research Grant</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Project Title</th>
                <th>Grant Amount</th>
                <th>Grant Provider</th>
                <th>Start Date</th>
                <th>Duration (Months)</th>
                <th>Project Leader</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($researchGrants as $researchGrant)
                <tr>
                    <td>{{ $researchGrant->project_title }}</td>
                    <td>{{ $researchGrant->grant_amount }}</td>
                    <td>{{ $researchGrant->grant_provider }}</td>
                    <td>{{ $researchGrant->start_date }}</td>
                    <td>{{ $researchGrant->duration }}</td>
                    <td>{{ $researchGrant->projectLeader->name }}</td>
                    <td>
                        <a href="{{ route('research-grants.edit', $researchGrant->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('research-grants.destroy', $researchGrant->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
