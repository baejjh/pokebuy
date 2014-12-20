<html>
<head>
	<title>Welcome Page</title>
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
		width: 1500px;
	}
	#choose_quotes_box
	{
		display: inline-block;
		vertical-align: top;
		overflow: scroll;
		height: 800px;
		width: 40%;
	}
	.choose_quotes
	{
		font-size: 8pt;
	}
	#right_side
	{
		display: inline-block;
		height: 800px;
		width: 45%;
		float: right;
	}
	#favorite_quotes_box
	{
		vertical-align: top;
		overflow: scroll;
		height: 400px;
	}
	.favorite_quotes
	{
		font-size: 8pt;
	}
	.posted_by
	{
		font-size: 8pt;
	}
	#contribute_quote_box
	{
		overflow: scroll;
	}
	textarea
	{
		overflow: scroll;
	}

	</style>
</head>
<body>
	<div id="container">
		<h1>Welcome, <?= $user['first_name']?> <?= $user['last_name']?> !</h1>
			
		<div id="choose_quotes_box">

			<h3>Quotable Quotes</h3>
			<form class="choose_quotes" action="/" method="post">
				<input type="text" value="Ralph Waldo is a boss" readonly>
				<p class="posted_by">Posted by first_name last_name</p>
				<input type="submit" class="submit">
			</form>
		</div>
		<div id="right_side">
			<div id="favorite_quotes_box">

				<h3>Your Favorites</h3>
				<form class="favorite_quotes" action="/" method="post">
					<input type="text" value="Ralph Waldo is a boss" readonly>
					<p class="posted_by">Posted by first_name last_name</p>
					<input type="submit" class="submit">
				</form>
			</div>	
			<div id="contribute_quote_box">
				<h3>Contribute a Quote:</h3>
				<form id="contribute_quote" action="/" method="post">
					<h4>Original Author:</h4>
					<input type="text">
					<h4>Message:</h4>
					<textarea rows="4" cols="50"></textarea>
					<input type="submit" class="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>