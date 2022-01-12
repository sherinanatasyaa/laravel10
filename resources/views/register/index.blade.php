<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    
<!-- Style CSS -->
<link rel="stylesheet" href="login/styles.css">


<h2>Welcome to My Website</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="/register" method="post">
			@csrf
			<h1>Create Account</h1>
			<div class="social-container">
			</div>
			<span>use your email for registration</span>
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button>Create</button>
		</form>
	</div>
	<div class="overlay-container">
	<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Already Registered?</h1>
				<p>Enjoy!</p>
				<a href="/index"><button class="ghost" id="signIn">Login</a></button>
				<div class="overlay-container">
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Created <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">sherinanatasyaa</a>
		- Enjoy
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">friends.</a>.
	</p>
</footer>

<!-- Style JS-->
<script src="login/scripts.js"></script>

</body>
</html>