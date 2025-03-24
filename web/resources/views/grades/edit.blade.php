@extends('layouts.app')

@section('content')
<h2>{{ $grade->id ? 'Edit' : 'Add' }} Grade</h2>

<form method="POST" action="{{ $grade->id ? route('grades.update', $grade->id) : route('grades.store') }}">
    @csrf
    @if($grade->id) @method('PUT') @endif

    <div class="form-group">
        <label>Course Code</label>
        <input type="text" name="course_code" class="form-control" value="{{ old('course_code', $grade->course_code) }}">
    </div>

    <div class="form-group">
        <label>Course Name</label>
        <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $grade->course_name) }}">
    </div>

    <div class="form-group">
        <label>Credit Hours</label>
        <input type="number" name="credit_hours" class="form-control" value="{{ old('credit_hours', $grade->credit_hours) }}">
    </div>

    <div class="form-group">
        <label>Grade</label>
        <select name="grade" class="form-control">
            @foreach(['A', 'B+', 'B', 'C+', 'C', 'D', 'F'] as $g)
                <option value="{{ $g }}" {{ $grade->grade == $g ? 'selected' : '' }}>{{ $g }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Term</label>
        <input type="number" name="term" class="form-control" value="{{ old('term', $grade->term) }}">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
