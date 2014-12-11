	<h1>Orders</h1>
		<p>Sort by status</p>

	<form action="sort_orders" method="post" id="order_sort_form">
		<input type="text" placeholder="Search Zip, Order ID, or Buyer's Name" id="word_search" name="word_search"> <!-- USED TO BE HERE: WHY? value="?= $id?>" -->
		<select name="selected_status" id="selected_status">
				<option value="">(Select Order Status)</option>
			    <option value="Pending">Pending</option>
			    <option value="Ordered">Ordered</option>
			    <option value="Shipped">Shipped</option>
			    <option value="Returned">Returned</option>
		</select>
		<input type="submit" value="Search Orders">
	</form>
	
	<script type="text/javascript">
	// alerts whenever button is submitted
	$(document).ready(function() {
		$('#order_sort_form').submit(function() {
		    if ($("#word_search").val() === "" && $("#selected_status").val() === "") {
		        alert('To search by orders, you must enter or choose a field');
		        return false;
		    }
		});
	});
	</script>

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
					<option><?= $one_order['order_status']; ?></option>
				<?php foreach($statuses as $status_type) {?>
					<option
						<?php if ($one_order['order_status'] === $status_type['status']) { echo "style = 'display:none'"; }?>>
							<?= $status_type['status']; ?>
					</option>
				<?php } //endforeach ?>
				</select>
			</td>
		</tr>
		<?php } //end the foreach loop of orders ?>
	</tbody>
	</table>
	<!-- Pagination -->
	<?php echo $links ?> 
</div><!-- close content div -->	
</body>
</html>