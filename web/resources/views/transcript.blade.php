@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Student Transcript</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Course</th>
                <th>Grade</th>
                <th>Credits</th>
            </tr>
        </thead>
        <tbody>
            @php $totalCredits = 0; @endphp
            @foreach($transcript as $course)
                @php $totalCredits += $course['credits']; @endphp
                <tr>
                    <td>{{ $course['course'] }}</td>
                    <td>{{ $course['grade'] }}</td>
                    <td>{{ $course['credits'] }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="text-end"><strong>Total Credits:</strong></td>
                <td><strong>{{ $totalCredits }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
