<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Orders | Dojo eCommerce</title>

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
	<input type="text" placeholder="Search">
	<select>
		<option>$statuses</option>
	</select>

	<table>
	<thead>
		<th>Order ID</th>
		<th>Name</th>
		<th>Date</th>
		<th>Billing Address</th>
		<th>Total</th>
		<th>Status</th>
	</thead>
	<tbody>
		<tr>
			<td>Order ID</td>
			<td>Name</td>
			<td>Date</td>
			<td>Billing Address</td>
			<td>Total</td>
			<td>
				<select>
					<option>$statuses</option>
				</select>
			</td>
		</tr>
	</tbody>
	</table>
	*pagination
	
</body>
</html>