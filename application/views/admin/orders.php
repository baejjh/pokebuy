	<h1>Orders</h1>
		<h2>Sort by status</h2>
		<h2>Submit staus of one order by id</h2>
		<h2>Display billing address</h2>
		<h2>Display Order name</h2>
		<h2>Search doesn't work</h2>

	<form action="#" method="post">
		<input type="text" placeholder="Search Orders">
		<input type="button" value="Search by Order Name">
	</form>
	
	<form action="sort_orders" method="post">
		<select>
			<?php foreach($statuses as $status_type)
				{ ?>
					<option>
						<?= $status_type['status'];
				} ?>
					</option>
		</select>
	</form>

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
			<td><a href="order_id/<?= $one_order['id']; ?>"><?= $one_order['id']; ?></a></td>
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
	<!-- *pagination -->
</div><!-- close content div -->	
</body>
</html>