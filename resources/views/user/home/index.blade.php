@extends('user.home.layout.app')

@section('title')
Instagram
@endsection

@section('content')

@include('user.home.components.header')
@include('user.home.components.main-container')
@include('user.profile.components.post-modal')
@include('user.home.components.navbar')

@endsection

