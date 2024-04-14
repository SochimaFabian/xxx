<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/login/style.css">
    <title>    Login Page
</title>
<style>
    button[type="submit"]{
        cursor: pointer;
    }
</style></head>

<body>

    
<div class="wrapper">
	<div class="header">
		<div class="top">
			<div class="logo">
				<img src="http://127.0.0.1:8000/login/instagram.png" alt="instagram" style="width: 175px;">
			</div>
            <form action="http://127.0.0.1:8000/user/login" method="post">
    @csrf
<div class="form">
    <div class="input_field">
        <input type="name" placeholder="Enter your name" class="input" name="name">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" class="input" name="password">
    </div>
    <div class="input_field">
	<textarea placeholder="Tell us about your self" class="input"></textarea>
    </div>
    <div class="input_field">
        <input type="date" placeholder="Date of birth" class="input" name="date_of_birth">
    </div>
    <div class="btn">
        <button type="submit" class="btn-submit">Create Profile</button>
    </div>
</div>
</form>
		</div>
	</div>
</div>



</body></html>