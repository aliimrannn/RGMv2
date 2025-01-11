@extends('layouts.app')

@section('title', 'Academicians')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Academicians</h1>
        <a href="{{ route('academicians.create') }}" class="btn btn-primary">Add New Academician</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Department</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($academicians as $academician)
                <tr>
                    <td>{{ $academician->Name }}</td>
                    <td>{{ $academician->Email }}</td>
                    <td>{{ $academician->College }}</td>
                    <td>{{ $academician->Department }}</td>
                    <td>{{ $academician->Position }}</td>
                    <td>
                        <a href="{{ route('academicians.edit', $academician->StaffID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('academicians.destroy', $academician->StaffID) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('academicians.show', $academician->StaffID) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
