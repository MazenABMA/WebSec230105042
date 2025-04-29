@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1>Welcome</h1>
    <p>You can navigate using the menu above.</p>

    <!-- Dark Mode Button -->
    <div style="position: fixed; bottom: 20px; right: 20px;">
        <button id="darkModeToggle" class="btn btn-outline-dark">Toggle Dark Mode</button>
    </div>
@endsection