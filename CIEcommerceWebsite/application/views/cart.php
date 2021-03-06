<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Carts | Dojo eCommerce</title>

	<style type="text/css">
	table {
	 		width: 100%;
	 	}
	tbody tr:nth-child(odd) {
		   background-color: silver;
	}
	</style>
</head>
<body>
	<? require('include/shopping_header.php')	?>
	<table>
	<thead>
		<th>Item</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</thead>
	<tbody>
		<tr>
			<td></td>
		</tr>
	</tbody>
	<tfoot>
		<td></td>
	</tfoot>
	</table>
	<a href="#">Continue Shopping</a>

	<h1>Shipping Information</h1>
	<form>
		<table>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="first_name"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="last_name"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>Address 2</td>
			<td><input type="text" name="address2"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city"></td>
		</tr>
		<tr>
			<td>State</td>
			<td><input type="text" name="state"></td>
		</tr>
		<tr>
			<td>Zipcode</td>
			<td><input type="text" name="zip_code"></td>
		</tr>
		</table>
	</form>

	<h1>Billing Information</h1>
	<form>
		<table>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="first_name"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="last_name"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>Address 2</td>
			<td><input type="text" name="address2"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city"></td>
		</tr>
		<tr>
			<td>State</td>
			<td><input type="text" name="state"></td>
		</tr>
		<tr>
			<td>Zipcode</td>
			<td><input type="text" name="zip_code"></td>
		</tr>
		</table>
	</form>
</body>
</html>