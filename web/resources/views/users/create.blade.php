@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add User</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form method="POST" action="{{ route('users_store') }}">
            @csrf

            <!-- Name Input -->
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Role Selection -->
        <!-- Only allow admins to create employees -->
<input type="hidden" name="role" value="employee">

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('users_list') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
