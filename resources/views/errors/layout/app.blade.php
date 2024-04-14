<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('bootstrap.app')
    <title>@yield('title')</title>
</head>
<body>
    <main class="w-100 vh-100 d-flex align-items-center justify-content-center bg-dark" style="color:#fff">
        <div class="container">
            <div class="container d-flex align-items-center justify-content-center flex-column">
            @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
