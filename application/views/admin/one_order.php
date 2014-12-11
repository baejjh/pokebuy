	<h1>Order ID: <?= $items_in_order[0]['order_id']; ?></h1>
	<p>Order Submitted: <?= $items_in_order[0]['order_submitted']; ?></p>

	<h4>Use foreach to display all items in order</h4>

	<div class="dashboard_left">
		<h2>Customer Shipping Info</h2>
		<table>
		<tr>
			<td>Name</td>
			<td>Address</td>
		</tr>
		</tr>
			<td><?= $items_in_order[0]['shipper_full_name']; ?></td>
			<td><?= $items_in_order[0]['shipping_address_street']; ?>
				<span class="line_break">
				<?= $items_in_order[0]['shipping_address_city_state'] . " " . $items_in_order[0]['shipping_address_zip']; ?>
			</td>
		</tr>
		</table>

		<h2>Customer Billing Info</h2>
		<table>
		<tr>
			<td>Name</td>
			<td>Address</td>
		</tr>
		<tr>
			<td><?= $items_in_order[0]['biller_full_name']; ?></td>
			<td><?= $items_in_order[0]['billing_address_street']; ?>
				<span class="line_break">
				<?= $items_in_order[0]['billing_address_city_state'] . " " . $items_in_order[0]['billing_address_zip']; ?>
			</td>
		</tr>
		</table>
	</div>

	<div class="dashboard_right">
	<table>
	<thead>
		<th>ID</th>
		<th>Photo</th>
		<th>Item</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</thead>
	<tbody>
		<?php foreach($items_in_order as $one_item) {?>
		<tr>
			<td><?= $one_item['item_id']; ?></td>
			<td><img src="<?= $one_item['item_main_img_url']; ?>" alt="<?= $one_item['item_img_description']; ?>" class="product_image_size"></td>
			<td><?= $one_item['item_name']; ?></td>
			<td><?= $one_item['item_single_price']; ?></td>
			<td><?= $one_item['item_quantity']; ?></td>
			<td><?= $one_item['item_total_price']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
	</table>

	<div class="status">
		Status: <?= $items_in_order[0]['order_status']; ?>
	</div>

	<div class="dashboard_total">
		<table>
			<tr>
				<td>Subtotal</td>
				<td><?= $items_in_order[0]['order_subtotal']; ?></td>
			</tr>
			<tr>
				<td>Shipping</td>
				<td><?= $items_in_order[0]['order_shipping_cost']; ?></td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td><?= $items_in_order[0]['order_total']; ?></td>
			</tr>
		</table>
	</div>

	</div>
</div> <!-- close content div -->
</body>
</html>