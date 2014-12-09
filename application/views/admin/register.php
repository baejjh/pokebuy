	<?php echo $this->session->flashdata('errors'); ?>
	<div class="container">
		<form id="admin_register_form" action="/new_admin" method="post">
		<h3>Register</h3>
		<table>
		<tr>
			<td><label for="email">Email Address:</label></td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td><label for="password">Password:</label></td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><label for="conf_password">Password Confirmation:</label></td>
			<td><input type="password" name="confirm_password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Register" name="login"></td>
		</tr>
		</table>
		</form>
		Already have an account? <a href="login">Login</a>.
		Don't want to be an admin? <a href="guest">Continue as Guest</a>.
	</div>
</div><!-- close content div -->
</body>
</html>