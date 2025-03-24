@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit User</h2>

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
        <form method="POST" action="{{ route('users_update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">Password (leave blank to keep current):</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- Role Selection -->
            <div class="mb-3">
                <label class="form-label">Role:</label>
                <select name="role" class="form-select" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('users_list') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
