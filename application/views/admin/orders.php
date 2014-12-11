	<h1>Orders</h1>
		<h2>Sort by status</h2>
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
		<th>Buyer's Name</th>
		<th>Order Last Updated</th>
		<th>Billing Address</th>
		<th>Total</th>
		<th>Status</th>
	</thead>
	<tbody>
		<?php foreach($orders as $one_order) {?>
		<tr>
		<!-- Order ID -->
			<td><a href="submitted_order/<?= $one_order['order_id']; ?>"><?= $one_order['order_id']; ?></a></td>

		<!-- Buyer's Name -->
			<td><?= $one_order['biller_full_name']; ?></td>

		<!-- Order Last Updated -->
			<td><?= $one_order['order_submitted']; ?></td>

		<!-- Billing Address -->
			<td><?= $one_order['billing_address_street']?>
				<span class="line_break">
				<?= $one_order['billing_address_city_state'] . " " . $one_order['billing_address_zip']?>
			</td>

		<!-- Total -->
			<td><?= "$ " . $one_order['order_total']; ?></td>
		
		<!-- Status -->
			<td>
				<select>
				<?php foreach($statuses as $status_type) {?>
					<option><?= $status_type['status'];?>
				<?php } ?>
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