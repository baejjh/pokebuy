	  <form class="login_admin_form" method="post" action="login">
		<fieldset>
		<legend>Admin Login Page</legend>
			<?php if(!empty($errors)) {echo $errors;} ?>
			Email: <input type="text" name="email"><br>
			Password: <input type="password" name="password">
			<input type="submit" value="Login">
	</form>

		Don't have an account? <a href="/register">Register</a>.
		Don't want an account? <a href="/guest">Continue as Guest</a>.
	</fieldset>
</div><!-- close content div -->
</body>
</html>