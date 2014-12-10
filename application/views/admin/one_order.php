	<h1>Welcome, Admin <?= $email; ?></h1> 
	<div class="dashboard_left">
		<h1>Order ID: $orders['id'];</h1>

		<ul>
			<li><h2>Customer Shipping Info</h2></li>
				<li>Name: $customers['first_name'] . " " . $customers['last_name'];</li>
				<li>Address: $addresses['address'];</li>
				<li>$addresses['address2'];</li>
				<li>City: $addresses['city'];</li>
				<li>State: $addresses['state'];</li>
				<li>Zipcode: $addresses['zip_code'];</li>
		</ul>

		<ul>
			<li><h2>Customer Billing Info</h2></li>
				<li>Name: $customers['first_name'] . " " . $customers['last_name'];</li>
				<li>Address: $addresses['address'];</li>
				<li>$addresses['address2'];</li>
				<li>City: $addresses['city'];</li>
				<li>State: $addresses['state'];</li>
				<li>Zipcode: $addresses['zip_code'];</li>
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
			<td>$orders_has_products['product_id'];</td>
			<td>$products['name'];</td>
			<td>$orders_has_products['price'];</td>
			<td>$orders_has_products['quantity_ordered'];</td>
			<td>$orders['total'];</td>
		</tr>
	</tbody>
	</table>

	<div class="status">
		Status: $statuses['status'];
	</div>

	<div class="dashboard_total">
		<table>
			<tr>
				<td>Subtotal</td>
				<td>$orders['subtotal']</td>
			</tr>
			<tr>
				<td>Shipping</td>
				<td>$orders['shipping_price']</td>
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