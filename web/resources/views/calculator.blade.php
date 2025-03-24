@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Simple Calculator</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form id="calculator-form">
                        <div class="mb-3">
                            <label for="num1" class="form-label">Enter First Number</label>
                            <input type="number" class="form-control" id="num1" required>
                        </div>
                        <div class="mb-3">
                            <label for="num2" class="form-label">Enter Second Number</label>
                            <input type="number" class="form-control" id="num2" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Operation</label>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary" onclick="calculate('+')">+</button>
                                <button type="button" class="btn btn-danger" onclick="calculate('-')">-</button>
                                <button type="button" class="btn btn-success" onclick="calculate('*')">×</button>
                                <button type="button" class="btn btn-warning" onclick="calculate('/')">÷</button>
                            </div>
                        </div>
                    </form>
                    <h3 class="mt-3 text-center">Result: <span id="result">0</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculate(operator) {
    let num1 = parseFloat(document.getElementById("num1").value);
    let num2 = parseFloat(document.getElementById("num2").value);
    let result = 0;

    if (isNaN(num1) || isNaN(num2)) {
        alert("Please enter valid numbers");
        return;
    }

    switch(operator) {
        case '+': result = num1 + num2; break;
        case '-': result = num1 - num2; break;
        case '*': result = num1 * num2; break;
        case '/': 
            if (num2 === 0) {
                alert("Cannot divide by zero!");
                return;
            }
            result = num1 / num2;
            break;
    }

    document.getElementById("result").textContent = result;
}
</script>
@endsection
