@extends('layouts.auth.app')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Kam</b>pusku</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif

      <form action="{{ route('login.submit') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection