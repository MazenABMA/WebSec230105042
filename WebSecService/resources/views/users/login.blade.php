@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="d-flex justify-content-center">
  <div class="card m-4 col-sm-6">
    <div class="card-body">
      <form action="{{route('do_login')}}" method="post">
      {{ csrf_field() }}

      {{-- Display Errors --}}
      <div class="form-group">
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            <strong>Error!</strong> {{$error}}
          </div>
        @endforeach
      </div>

      {{-- Email Input --}}
      <div class="form-group mb-2">
        <label for="model" class="form-label">Email :</label>
        <input type="email" class="form-control" placeholder="email" name="email" required>
      </div>

      {{-- Password Input --}}
      <div class="form-group mb-2">
        <label for="model" class="form-label">Password:</label>
        <input type="password" class="form-control" placeholder="password" name="password" required>
      </div>

      <div class="form-group mb-2">
  <button type="submit" class="btn" style="background-color: black; color: white; width: 100%;">Login</button>
</div>

<div class="form-group mb-2 text-center d-flex justify-content-around">
  {{-- Google Login Button --}}
  <a href="{{ url('auth/google') }}" class="btn" style="background-color: white; color: #d9534f; border: 1px solid #d9534f; display: flex; align-items: center; gap: 5px;">
    <span style="font-size: 14px;">Login with Google</span>
  </a>

  {{-- Facebook Login Button --}}
  <a href="{{ url('auth/facebook') }}" class="btn btn-primary" style="display: flex; align-items: center; gap: 5px;">
    <span style="font-size: 14px;">Login with Facebook</span>
  </a>
</div>
</div>
 


</div>
    </form>
    </div>
  </div>
</div>
@endsection