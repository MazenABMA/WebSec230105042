@extends('layouts.app')

@section('content')
<h2>Add User</h2>

<form method="POST" action="{{ route('users_store') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Save</button>
</form>

<a href="{{ route('users_list') }}">Back</a>
@endsection
