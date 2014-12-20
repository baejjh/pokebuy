<html>
<head>
	<title>Login Page</title>
	<style type="text/css">
	*
	{
		margin: 5px auto;
		padding: 5px;
		font-family: sans-serif;
		border: 1px solid black;
	}
	#container
	{
		width: 1200px;
	}
	#register
	{
		display: inline-block;
		vertical-align: top;
	}
	#login
	{
		display: inline-block;
		vertical-align: top;
	}
	</style>
</head>
<body>
	<div id="container">
		<form id="register" action="/register" method="post">
			<h1>Register</h1>
			<h3>First Name:</h3>
			<input type="text" name="first_name" value=>
			<h3>Last Name:</h3>
			<input type="text" name="last_name">
			<h3>Screen Name:</h3>
			<input type="text" name="screen_name">
			<h3>Email:</h3>
			<input type="text" name="email">
			<h3>Password:</h3>
			<input type="password" name="password">
			<p>Password should be at least 8 characters</p>
			<h3>Confirm Password:</h3>
			<input type="password" name="confirm_password">
			<h3>Date of Birth:</h3>
			<h4>Day: (Please use '00' format, ex. '01')</h4>
			<input type="text" name="birth_day">
			<h4>Month: (Please use '00' format, ex. '01')</h4>
			<input type="text" name="birth_month">
			<h4>Year: (Please use '00' format, ex. '01')</h4>
			<input type="text" name="birth_year">
			<input type="submit" id="submit">
		</form>
		<form id="login" action="/login" method="post">
			<h1>Login</h1>
			<h3>Email:</h3>
			<input type="text" name="email">
			<h3>Password:</h3>
			<input type="password" name="password">
			<input type="submit" id="submit">
		</form>
	</div>
</body>
</html>