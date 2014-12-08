<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard | Dojo eCommerce</title>

	<style type="text/css">
	 	div {
	 		outline: 1px solid;
	 	}
	 	.left {
	 		display: inline-block;
	 		vertical-align: top;
	 		margin: 0px auto;
	 	}
	 	.right {
			display: inline-block;
	 		vertical-align: top;
	 		width: 60%;
	 		margin: 0px auto;
	 	}
	 	.status{
	 		background-color: lime;
	 		color: green;
	 		display: inline-block;
	 		vertical-align: top;
	 		margin: 0px auto;
	 	}
	 	.total{
	 		display: inline-block;
	 		vertical-align: top;
	 		margin-left: 250px;
	 	}
	 	table {
	 		width: 100%;
	 	}
	 	tbody tr:nth-child(odd) {
		   background-color: silver;
		}
	</style>
</head>
<body>
	<? require('include/dashboard_header.php')	?>
	<div class="left">
		<h1>Order ID: $orders['id'];</h1>

		<ul>
			<li><h2>Customer Shipping Info</h2></li>
				<li>Name: $orders['name'];</li>
				<li>Address: $orders['address'];</li>
				<li>$orders['address2'];</li>
				<li>City: $orders['city'];</li>
				<li>State: $orders['state'];</li>
				<li>Zipcode: $orders['zip_code'];</li>
		</ul>

		<ul>
			<li><h2>Customer Billing Info</h2></li>
				<li>Name: $orders['name'];</li>
				<li>Address: $orders['address'];</li>
				<li>$orders['address2'];</li>
				<li>City: $orders['city'];</li>
				<li>State: $orders['state'];</li>
				<li>Zipcode: $orders['zip_code'];</li>
		</ul>
	</div>

	<div class="right">
	<table>
	<thead>
		<th>ID</th>
		<th>Item</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</thead>
	<tbody>
		<tr>
			<td>['id'];</td>
			<td>['name'];</td>
			<td>['price'];</td>
			<td>['quantity'];</td>
			<td>['total'];</td>
		</tr>
	</tbody>
	</table>

	<div class="status">
		Status: $status;
	</div>
	<div class="total">
		<table>
			<tr>
				<td>Subtotal</td>
				<td>$order['totals']</td>
			</tr>
			<tr>
				<td>Shipping</td>
				<td>$shippings['price']</td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td>$orders['total']</td>
			</tr>
		</table>
	</div>
	</div>
</body>
</html>