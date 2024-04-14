@extends('auth.layout')

@section('title')
    SignUp Page
@endsection

@section('form')
<form action="{{ route('createUser') }}" method="post">
    @csrf
<div class="form">
    <div class="input_field">
        <input type="email" placeholder="Email Address" class="input" name="email">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Username" class="input" name="username">
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
<p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
@endsection