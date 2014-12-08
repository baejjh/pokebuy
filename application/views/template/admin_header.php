<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin | Gotta Code 'Em All</title>

	<!-- need to move this into a separate file named "store_style"
	<link rel="stylesheet" type="text/css" href="store_style.css"> -->
	<style type="text/css">
	*{
		margin: 0px auto;
		font-family: arial;
	}
	.admin_header
	{
	    color: white;
	    background:red; /*need to echo different colors depending on admin vs. user*/
	    height: 30px; /*should change .content margin-top to this value + padding-top*/
	    padding-top: 10px;
	    width:100%;
	    position:fixed;
	    top: 0px;
	}
	.content
	{
	    margin-top: 40px; /* .header's height + padding-top*/
	    width:100%;
	    height: auto;
	}
	table
	{
	 	width: 100%;
	}
 	tbody tr:nth-child(odd)
 	{
	   background-color: silver;
	}
	li {
		display: inline-block;
		list-style-type: none;
	}
	.dashboard_left
	{
 		display: inline-block;
 		vertical-align: top;
 		margin: 0px auto;
 	}
 	.dashboard_right
 	{
		display: inline-block;
 		vertical-align: top;
 		width: 60%;
 		margin: 0px auto;
 	}
 	.status
 	{
 		background-color: lime;
 		color: green;
 		display: inline-block;
 		vertical-align: top;
 		margin: 0px auto;
 	}
 	.dashboard_total
 	{
 		display: inline-block;
 		vertical-align: top;
 		margin-left: 250px;
 	}
	.each_product
	{
		display: inline-block;
		vertical-align: top;
	}
	</style>
</head>


<body>

<div class="content">
	<ul class="admin_header">
		<li><a href="/dashboard">Dashboard</a></li>
		<li><a href="/orders">Orders</a></li>
		<li><a href="/products">Products</a></li>
		<li><a href="/logoff">Log Off</a></li>
	</ul>