<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login | Dojo eCommerce</title>

	<style type="text/css">

	</style>
</head>
<body>
	<? require('include/dashboard_header.php')	?>
	<form class="login_admin_form" method="post" action="">
	<fieldset>
	<legend>Admin Login Page</legend>
		Email: <input type="text" name="email"><br>
		Password: <input type="password" name="password">
		<input type="submit" name="admin_login" value="Login">

		<a href="#">Don't have an account? Register.</a>
	</fieldset>
	</form>
</body>
</html>

			 		//to prevent SQL injections
			$post['first_name']=escape_this_string($post['first_name']);
			$post['last_name']=escape_this_string($post['last_name']);
			$post['email']=escape_this_string($post['email']);
			
					// this is where we encrypt

			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$post['password'] = escape_this_string($_POST['password']);
			$encrypted_password = crypt($post['password'], $salt);
					
					//DB insertion
			$query1 = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
					  VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['email']}', '{$encrypted_password}', NOW(), NOW())";	
			run_mysql_query($query1);
			
			// stores posted registering user information into sessions
			$_SESSION['users'] = $_POST;
			
			// checks and brings from DB the user ID 
			$query2 = "SELECT users.id FROM users WHERE users.email = '{$post['email']}'";
			// stores the matching user id to sessions for future use
			$user = fetch_record($query2);
			$_SESSION['users']['id'] = $user;

			header('location: wallsuccess.php');