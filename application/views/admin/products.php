	<input type="text" placeholder="Search">
	<a href="/add_product">Add New Product</a>

	<table id ="admin_products_table">
	<thead>
		<th>Picture</th>
		<th>ID</th>
		<th>Name</th>
		<th>Inventory Count</th>
		<th>Quantity Sold</th>
		<th>Action</th>
	</thead>
	<tbody>
		
	<?php foreach($products as $each_product) {?>
		<tr>
			<td><?= $each_product['main_image']; ?></td>
			<td><?= $each_product['id']; ?></td>
			<td><?= $each_product['name']; ?></td>
			<td><?= $each_product['inventory_count']; ?></td>
			<td><?= $each_product['quantity_sold']; ?></td>
			<td>
				<a href="#">Edit</a>
				<a href="/delete">Delete</a>
			</td>
		</tr>
	<?php } ?>

	</tbody>
	</table>
	*pagination
</div><!-- close content div -->
</body>
</html>