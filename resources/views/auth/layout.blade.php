<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
    <title>@yield('title')</title>
</head>
<style>
    button[type="submit"]{
        cursor: pointer;
    }
</style>
<body>

    
<div class="wrapper">
	<div class="header">
		<div class="top">
			<div class="logo">
				<img src="{{ asset('login/instagram.png') }}" alt="instagram" style="width: 175px;">
			</div>
            @yield('form')
			<div class="or">
				<div class="line"></div>
				<p>OR</p>
				<div class="line"></div>
			</div>
			<div class="dif">
				<div class="fb">
					<img src="{{ asset('login/facebook.png') }}" alt="facebook">
					<p>Log in with Facebook</p>
				</div>
				<div class="forgot">
					<a href="#">Forgot password?</a>
				</div>
			</div>
		</div>
		<div class="signup">
			@yield('navigate')
		</div>
	</div>
</div>

</body>
</html>
