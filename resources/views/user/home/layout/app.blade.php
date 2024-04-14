<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/preloader.css') }}">
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  --}}
    {{--  <script src="{{ asset('js/home/script.js') }}" defer></script>  --}}
    <script src="{{ asset('js/preloader.js') }}"></script>
    <title>@yield('title')</title>
</head>

<body>
    <div class="preloader-body">
        @yield('content')
    </div>
</body>

</html>
