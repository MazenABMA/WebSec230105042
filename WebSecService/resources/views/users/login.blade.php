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

      {{-- Submit Button --}}
      <div class="form-group mb-2">
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </div>
      <div class="form-group mb-2 text-center d-flex justify-content-around">
    {{-- Google Login Button --}}
    <a href="{{ url('auth/google') }}" class="btn btn-danger" style="display: flex; align-items: center; gap: 5px;">
        <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20" height="20" alt="Google">
        <span style="font-size: 14px;">Login with Google</span>
    </a>

    {{-- Facebook Login Button --}}
    <a href="{{ url('auth/facebook') }}" class="btn btn-primary" style="display: flex; align-items: center; gap: 5px;">
        <img src="https://www.svgrepo.com/show/475645/facebook-color.svg" width="20" height="20" alt="Facebook">
        <span style="font-size: 14px;">Login with Facebook</span>
    </a>
</div>
 


</div>
    </form>
    </div>
  </div>
</div>
@endsection