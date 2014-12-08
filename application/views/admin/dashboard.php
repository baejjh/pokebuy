	<h1>Welcome, Admin <?= $email; ?></h1> 
	<div class="dashboard_left">
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

	<div class="dashboard_right">
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

	<div class="dashboard_total">
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
</div> <!-- close content div -->
</body>
</html>