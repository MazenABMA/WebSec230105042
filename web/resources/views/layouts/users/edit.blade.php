@extends('layouts.app')

@section('content')
<h2>Edit User</h2>

<form method="POST" action="{{ route('users_update', $user->id) }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    
    <label>Password (leave blank to keep current):</label>
    <input type="password" name="password">

    <button type="submit">Update</button>
</form>

<a href="{{ route('users_list') }}">Back</a>
@endsection
