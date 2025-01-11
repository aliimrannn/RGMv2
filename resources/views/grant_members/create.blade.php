@extends('layouts.app')

@section('title', 'Add Project Member')

@section('content')
    <div class="container">
        <h1>Add Member to Project</h1>

        <form action="{{ route('grantmembers.store', $project->GrantID) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="StaffID" class="form-label">Select Academician</label>
                <select name="StaffID" id="StaffID" class="form-select" required>
                    <option value="" disabled selected>Select an academician</option>
                    @foreach($availableAcademicians as $academician)
                        <option value="{{ $academician->StaffID }}">{{ $academician->Name }} - {{ $academician->Position }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Member</button>
            <a href="{{ route('projects.show', $project->GrantID) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
