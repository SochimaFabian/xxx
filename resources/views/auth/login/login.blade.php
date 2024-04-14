@extends('auth.layout')

@section('title')
    Login Page
@endsection

@section('form')
<form action="{{ route('login') }}" method="post">
    @csrf
<div class="form">
    <div class="input_field">
        <input type="email" placeholder="Email Address" class="input" name="email">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" class="input" name="password">
    </div>
    <div class="btn">
        <button type="submit" class="btn-submit">Log In</button>
    </div>
</div>
</form>
@endsection

@section('navigate')
<p>Already have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
@endsection


