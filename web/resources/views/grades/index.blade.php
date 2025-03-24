@extends('layouts.app')

@section('content')
<h2>Grades List</h2>
<a href="{{ route('grades.create') }}" class="btn btn-success">Add Grade</a>

@foreach($grades as $term => $termGrades)
    <h3>Term {{ $term }}</h3>
    <table class="table">
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Credit Hours</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
        @php 
            $totalCH = 0; $totalGPA = 0;
        @endphp
        @foreach($termGrades as $grade)
            <tr>
                <td>{{ $grade->course_code }}</td>
                <td>{{ $grade->course_name }}</td>
                <td>{{ $grade->credit_hours }}</td>
                <td>{{ $grade->grade }}</td>
                <td>
                    <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @php
                $totalCH += $grade->credit_hours;
                $totalGPA += $grade->credit_hours * $grade->getGradePoint();
            @endphp
        @endforeach
    </table>

    <h4>Total CH: {{ $totalCH }}</h4>
    <h4>GPA: {{ $totalCH > 0 ? number_format($totalGPA / $totalCH, 2) : 0.00 }}</h4>
@endforeach

@endsection
