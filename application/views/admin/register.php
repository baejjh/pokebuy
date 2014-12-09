	<?php echo $this->session->flashdata('errors'); ?>
	<div class="container">
		<form id="admin_register_form" action="/new_admin" method="post">
			<h3>Register</h3>
				<label for="email">Email Address:</label>
				<input type="text" name="email">
				<label for="password">Password:</label>
				<input type="password" name="password">
				<label for="conf_password">Password Confirmation:</label>
				<input type="password" name="confirm_password">
				<input type="submit" value="Register" name="login">
		</form>
		Already have an account? <a href="/admin">Login</a>.
	</div>
</div><!-- close content div -->
</body>
</html>