@extends('user.profile.layout.app')

    @section('content')
        @include('user.profile.components.header')
        @include('user.profile.components.div-flex')
        @include('user.profile.components.post-modal')
        @include('user.profile.components.footer')
    @endsection

    @section('title')
        {{ ucwords($user->profile->name) }} ({{ ucwords('@' . $user->username)}}) • Instagram photos and videos
    @endsection
