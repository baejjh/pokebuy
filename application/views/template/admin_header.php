<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin | Gotta Code 'Em All</title>

	<style type="text/css">
	.header-cont
	{
	    width:100%;
	    position:fixed;
	    top:0px;
	}
	.header
	{
	    height:50px;
	    background:red; /*need to echo different colors depending on admin vs. user*/
	    width:960px;
	    margin:0px auto;
	}
	.content
	{
	    width:960px;
	    background: #F0F0F0;
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
<div class="header-cont">
    <div></div>
</div>
 
<div class="content">
	<div class="header">
		<h1>Dashboard</h1>
		<a href="#">Orders</a>
		<a href="#">Products</a>
		<a href="#">Log Off</a>
	</div>