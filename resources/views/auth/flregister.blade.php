@extends('layouts.app')

@section('content')
<div class="login-section register-section">
<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="{{ url('register') }}">
    {{ csrf_field() }}
	<h2>Sign Up</h2>
      <input type="hidden" name="user_type" value="freelancer">
      <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="First Name" required />
      <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required />
	  <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required />
	  <input type="password" id="password" name="password" placeholder="Password" required />
      <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
	  
      <button type="submit">Get Started</button>
    
    </form>
  </div>
</div>
</div>

@endsection
