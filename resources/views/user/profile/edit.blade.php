@extends('user.profile.layout.app')

@section('content')
@include('user.profile.components.header')
<div class="flex">
    @include('user.profile.components.subs.div-flex-aside')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <main class="max-w-[1280px] md:ps-20 xl:ps-[260px] m-auto">
        <div class="flex align-items-center justify-content-center">
            <!-- Section 1: List of items -->
            <section class="md:w-1/2 overflow-y-auto w-half">
                <div>
                    <h2 class="text-xl font-normal">For Professionals</h2>
                    <!-- List of items -->
                    <ul class="list-disc list-inside">
                        <li>What you see</li>
                        <li>Who can see your content</li>
                        <li>How others can interact with you</li>
                        <li>Your app and media</li>
                    </ul>
                </div>
                <div class="mt-8">
                    <h2 class="text-xl font-normal">For Families</h2>
                    <!-- List of items -->
                    <ul class="list-disc list-inside">
                        <li>More info and support</li>
                    </ul>
                </div>
            </section>

            <!-- Section 2: Edit profile form -->
            <section class="md:w-1/2 w-half">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </main>
    @include('user.profile.components.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@endsection

@section('title')
{{ ucwords($user->profile->name) }} ({{ ucwords('@' . $user->username)}}) • Instagram photos and videos
@endsection
