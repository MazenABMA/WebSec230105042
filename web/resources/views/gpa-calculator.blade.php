@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">GPA Calculator</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Select Courses & Enter Grades</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Credit Hours</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody id="courseTable">
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['code'] }}</td>
                            <td>{{ $course['title'] }}</td>
                            <td class="credits">{{ $course['credits'] }}</td>
                            <td>
                                <select class="form-control grade">
                                    <option value="4">A (4.0)</option>
                                    <option value="3.7">A- (3.7)</option>
                                    <option value="3.3">B+ (3.3)</option>
                                    <option value="3">B (3.0)</option>
                                    <option value="2.7">B- (2.7)</option>
                                    <option value="2.3">C+ (2.3)</option>
                                    <option value="2">C (2.0)</option>
                                    <option value="1.7">C- (1.7)</option>
                                    <option value="1.3">D+ (1.3)</option>
                                    <option value="1">D (1.0)</option>
                                    <option value="0">F (0.0)</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button class="btn btn-primary mt-3" onclick="calculateGPA()">Calculate GPA</button>
            <h3 class="mt-3">Your GPA: <span id="gpaResult">0.00</span></h3>
        </div>
    </div>
</div>

<script>
function calculateGPA() {
    let totalCredits = 0;
    let totalPoints = 0;

    document.querySelectorAll("#courseTable tr").forEach(row => {
        let credits = parseFloat(row.querySelector(".credits").textContent);
        let grade = parseFloat(row.querySelector(".grade").value);

        totalCredits += credits;
        totalPoints += grade * credits;
    });

    let gpa = totalCredits ? (totalPoints / totalCredits).toFixed(2) : 0;
    document.getElementById("gpaResult").textContent = gpa;
}
</script>
@endsection
