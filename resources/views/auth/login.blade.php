@extends('layouts.app')

@section('content')
<div class="login-section">
<div class="login-page">
  <div class="form">
   
    <form class="login-form" method="POST" action="{{ url('login') }}">
    {{ csrf_field() }}
	<h2>Login in and get to work</h2>
   @if($errors->any())
      <h5 style="color: #862222;">{{$errors->first()}}</h5>
    @endif
      <input  id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email"/>
      <input id="password" type="password" name="password" required placeholder="Password"/>

	  
              <label for="checkbox">
                  <input id="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
          
  
          
          <a class="btn btn-link" href="{{ url('forget/password') }}">
              Forgot Your Password?
          </a>
   
      <button>login</button>
      <p class="message">Do'nt have an account? <a href="{{ url('register') }}"> Sign up</a></p>
    </form>
  </div>
</div>
</div>

@endsection
