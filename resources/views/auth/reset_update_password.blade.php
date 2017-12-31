@extends('layouts.app')

@section('content')
<div class="login-section">
<div class="login-page">
  <div class="form">
   <form class="login-form" method="POST" action="{{ url('/reset/password/'.$reset_token) }}">
    {{ csrf_field() }}
     <h2>Reset Password</h2>
     @if($errors->any())
        <h5 style="color: #862222;">{{$errors->first()}}</h5>
      @endif
      <input type="password" name="password" required autofocus placeholder="Enter Password"/>  
      <input type="password" name="confirm" required placeholder="Enter Confirm Password"/>   
      <button>Update Password</button>
      <p class="message">Do'nt have an account? <a href="{{ url('register') }}"> Sign up</a></p>
    </form>
  </div>
</div>
</div>

@endsection
