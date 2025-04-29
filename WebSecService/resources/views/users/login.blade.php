@extends('layouts.master')
@section('title', 'Login')
@section('content')

<!-- Include Bootstrap Icons (Optional for logos) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
  <div class="card shadow-sm p-4" style="width: 100%; max-width: 420px;">
    <h3 class="mb-4 text-center">Login</h3>
    
    <form action="{{ route('do_login') }}" method="POST">
      {{ csrf_field() }}

      {{-- Display Validation Errors --}}
      @foreach($errors->all() as $error)
        <div class="alert alert-danger">
          <strong>Error:</strong> {{ $error }}
        </div>
      @endforeach

      {{-- Email Input --}}
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
      </div>

      {{-- Password Input --}}
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="••••••••" required>
      </div>

      {{-- Submit Button --}}
      <div class="mb-3">
        <button type="submit" class="btn btn-dark w-100">Login</button>
      </div>

      {{-- Divider --}}
      <div class="text-center my-3 text-muted">
        or continue with
      </div>

      {{-- Social Login Buttons --}}
      <div class="d-grid gap-2">
        {{-- Google --}}
        <a href="{{ url('auth/google') }}" class="btn btn-outline-danger d-flex align-items-center justify-content-center">
          <i class="bi bi-google me-2"></i> Login with Google
        </a>

        {{-- Facebook --}}
        <a href="{{ url('auth/facebook') }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center">
          <i class="bi bi-facebook me-2"></i> Login with Facebook
        </a>

        {{-- GitHub --}}
        <a href="{{ url('/auth/github') }}" class="btn btn-outline-dark d-flex align-items-center justify-content-center">
          <i class="bi bi-github me-2"></i> Login with GitHub
        </a>
      </div>
    </form>
  </div>
</div>

@endsection