@extends('layouts.app')

@section('content')
<h2>Users List</h2>

<!-- Search Filter -->
<form method="GET">
    <input type="text" name="keywords" placeholder="Search users..." value="{{ request()->keywords }}">
    <button type="submit">Search</button>
    <a href="{{ route('users_create') }}" class="btn btn-success">Add User</a>
</form>

<!-- Users Table -->
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="{{ route('users_edit', $user->id) }}">Edit</a> | 
            <a href="{{ route('users_delete', $user->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- Pagination -->
{{ $users->links() }}
@endsection
