	<form action="#" method="post">
		<input type="text" placeholder="Search Orders">
		<input type="button" value="Search">
	</form>
	
	<form action="sort_orders" method="post">
		<select>
			<?php foreach($statuses as $status_type) {?>
				<option><?= $status_type['status'];?>
			<?php } ?></option>
		</select>
	</form>

	<h1>Keep track of the Orders as an Admin</h1>
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
		<?php foreach($orders as $one_order) { ?>
		<tr>
			<td><?= $one_order['id']; ?></td>
			<td><?= $one_order['billing_customer_id']; ?> then pull $customer['first_name']</td>
			<td><?= $one_order['order_date']; ?></td>
			<td><?= $one_order['billing_address_id']; ?> then pull full shipping address</td>
			<td><?= $one_order['total']; ?></td>
			<td>
				<select>
				<?php foreach($statuses as $status_type) {?>
					<option><?= $status_type['status'];?>
				<?php } ?></option>
				</select>
			</td>
		</tr>
		<? } //end the foreach loop of orders ?>
	</tbody>
	</table>
	*pagination
</div><!-- close content div -->	
</body>
</html>