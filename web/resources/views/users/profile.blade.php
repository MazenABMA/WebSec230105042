@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">User Profile</h2>

    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <table class="table table-striped">
            <tr>
                <th class="w-50">Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>
                    @foreach($user->roles as $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
        </table>

        <div class="text-center mt-3">
            @if(auth()->user()->id === $user->id || auth()->user()->role === 'admin')
                <a href="{{ route('users_edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
            @endif
            <a href="{{ route('users_list') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
