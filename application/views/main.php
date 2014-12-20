<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login/Registration</title>
<meta charset="utf-8">
<style type="text/css">
form 
        {
            margin: 20px;
        }
        fieldset 
        {
            width: 300px;
        }
        label 
        {
            display: inline-block;
            width: 100px;
            margin-left: 5%;
            margin-right: 10px;
            text-align: right;
        }
        fieldset div 
        {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: right;
        }
        fieldset div:last-child 
        {
            text-align: right;
        }
        h3
        {
            color:red;
        }
</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script>
        $(function() 
        {
            $( "#datepicker" ).datepicker(
            {
                changeMonth: true,
                changeYear: true
            });
        });
</script>
</head>
<body>
<h3><?= $this->session->flashdata('message') ?></h3>

<form id="register" action="/mains/try_reg" method="post">
    <fieldset>
        <legend>Register</legend>
        <div><label for="reg_name">Name: </label><input type="text" id="reg_name" name="name" value="" placeholder="your name here..."></div>
        <div><label for="reg_alias">Alias: </label><input type="text" id="reg_alias" name="alias" value="" placeholder="your alias here..."></div>
        <div><label for="reg_email">Email: </label><input type="text" id="reg_email" name="email" value="" placeholder="valid email here..."></div>
        <div><label for="reg_password">Password: </label><input type="password" id="reg_password" name="password" value="" placeholder="at least 8 characters"></div>
        <div><label for="reg_password2">Confirm: </label><input type="password" id="reg_password2" name="password2" value="" placeholder="must match above"></div>
        <div><label for="birth_date">Date of Birth: </label><input type="text" id="datepicker" name="datepicker"></div>
        <div><input type="submit" value="Register"></div>
    </fieldset>
</form>

<form id="login" action="/mains/try_login" method="post">
    <fieldset>
        <legend>Log In</legend>
        <div><label for="login_email">Email: </label><input type="text" id="login_email" name="email" value=""></div>
        <div><label for="login_password">Password: </label><input type="password" id="login_password" name="password" value=""></div>
        <div><input type="submit" value="Login"></div>
    </fieldset>
</form>
</body>
</html>