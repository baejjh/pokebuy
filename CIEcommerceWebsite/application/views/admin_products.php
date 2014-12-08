<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products | Dojo eCommerce</title>

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
	<? require('include/dashboard_header.php')	?>
	<input type="text" placeholder="Search">
	<a href="#">Add New Product</a>

	<table>
	<thead>
		<th>Picture</th>
		<th>ID</th>
		<th>Name</th>
		<th>Inventory Count</th>
		<th>Quantity Sold</th>
		<th>Action</th>
	</thead>
	<tbody>
		<tr>
			<td>Picture</td>
			<td>ID</td>
			<td>Name</td>
			<td>Inventory Count</td>
			<td>Quantity Sold</td>
			<td>
				<a href="#">Edit</a>
				<a href="#">Delete</a>
			</td>
		</tr>
	</tbody>
	</table>
	*pagination
</body>
</html>