@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Users List</h2>

    <!-- Search Filter -->
    <form method="GET" class="mb-3 d-flex">
        <input type="text" name="keywords" class="form-control me-2" placeholder="Search users..." value="{{ request()->keywords }}">
        <button type="submit" class="btn btn-primary me-2">Search</button>
        <a href="{{ route('users_create') }}" class="btn btn-success">Add User</a>
    </form>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td> <!-- Display user role -->
                    <td>
                        <a href="{{ route('profile', $user->id) }}" class="btn btn-sm btn-info">View Profile</a>  
                        <a href="{{ route('users_edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a> 
                        <a href="{{ route('users_delete', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
