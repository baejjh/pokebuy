<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<style type="text/css">

	</style>
	<script type="text/javascript">

	</script>
</head>
<body>
	
	<a href="/mains/logout">Logout</a>
<h1>Welcome, <?= $this->session->userdata['record']['alias'] ?></h1>
<h3><?= count($user) ?> people poked you!</h3>
<h3><?php foreach ($user as $user) { ?>
	<?='<p>' . $user['alias'] . ' poked you ' . $user['poke_count'] . ' times.</p>'?>
<?php } ?></h3>
<div id="pokers">
</div>
<h3>People you may want to poke:</h3>
<table>
<thead><th>Name</th>
	<th>Alias</th>
	<th>Email Address</th>
	<th>Poke History</th>
	<th>Action</th>
</thead>
<tbody></tbody>
<?php
// var_dump($all_users);
// die('here');
 for($i=0;$i<count($all_users);$i++){
 	if ($all_users[$i]['id'] != $this->session->userdata['record']['id']) {
	echo
'<tr>
	<td>' . $all_users[$i]['name'] . '</td>
	<td>' . $all_users[$i]['alias'] . '</td>
	<td>' . $all_users[$i]['email'] . '</td>
	<td>' . $all_users[$i]['Total_pokes'] . '</td>
	<td> <a href="/add_poke/' . $all_users[$i]["id"] . '">Poke</a> </td>
</tr>';
 } 
 	}?>
</table>
</body>
</html>