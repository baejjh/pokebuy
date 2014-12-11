<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shop | Gotta Code 'Em All</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/store_style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<html>
<body>
<div class="content">
	<ul class="shopping_header_div">
		<li><a href="/default_controller"><h1>Dojo De Poké: Get 'Dat POKéMON<h1></a></li>
		<li><a href="/cart">Shopping Cart (
<?php 	if(!empty($cart_num)) {
			echo $cart_num;
		} else {
			echo 'Empty';
		} ?>)</a></li>
	</ul>
