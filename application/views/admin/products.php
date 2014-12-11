	<h1>Products</h1>
		<h2>Add Product works but no image file upload</h2>
		<h2>Edit function doesn't work</h2>
		<h2>Delete doesn't work</h2>	
			<p>Cannot delete or update a parent row: a foreign key constraint fails
			WHEN DELETE BUTTON IS ClICKED AND DIRECTED, there are undefined variables of:
				user,
				pagination_links,
				products</p>
		<h2>Pagination doesn't work</h2>
		<h2>Search doesn't work</h2>

	<form action="#" method="post">
		<input type="text" placeholder="Search Products">
		<input type="button" value="Search by Product Name">
	</form>

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
			<td><img src="<?= $each_product['item_main_img_url']; ?>" alt="<?= $each_product['item_img_description']; ?>"></td>
			<td><?= $each_product['item_id']; ?></td>
			<td><?= $each_product['item_name']; ?></td>
			<td><?= $each_product['item_inventory']; ?></td>
			<td><?= $each_product['item_sold']; ?></td>
			<td>
				<a href="#openModal">Edit</a>
				<a href="delete_product/<?= $each_product['item_id']; ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>

	</tbody>
	</table>

	<!-- pagination starts here -->
	<?= "<div class='pagination'>" . $pagination_links . "</div>"; ?>








	<!-- modal for product edit starts here -->
	<div id="openModal" class="modalDialog">
	    <div><a href="#close" title="Close" class="close">X</a>

	        <h2>Edit Product</h2>
	    <form action="edit_product/<?= $each_product['id']; ?>" method='post'>
			<table>
			<tr>
				<td><label for="name">Name:</label></td>
				<td><input type="text" name="name" value="<?= $each_product['name']; ?>"></td>
			</tr>
			<tr>	
				<td><label for="description">Description:</label></td>
				<td><input type="text" name="description" value="<?= $each_product['inventory_count']; ?>"></td>
			</tr>
			<tr>
				<td>Categories</td>
				<td>
					<select>
					<?php foreach ($categories as $category) { ?>
						<option><?= $category['name']; ?> - 
						<!-- probably an img src instead of a href -->
							<a href="edit_category/<?= $category['id']; ?>">edit</a> /
							<a href="delete_category/<?= $category['id']; ?>">delete</a>
						</option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Or Add New Cateory</td>
				<td><input type="text" name="new_category" placeholder="Add New Category Name"></td>
			</tr>
			<tr>
				<td>Images</td>
				<td></td>
			</tr>
			<tr>
				<td><label for="price">Price:</label></td>
				<td><input type="text" name="price" value="<?= $each_product['price']; ?>">
			</tr>
			<tr>
				<td><label for="inventory_count">Inventory Count:</label></td>
				<td><input type="text" name="inventory_count" value="<?= $each_product['inventory_count']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="button" value="Edit">
				<td><input type="button" value="Preview">
				<td><input type="button" value="Cancel"></td>
			</tr>
			</table>
	 	</form>
	    </div>
	</div>
</div><!-- close content div -->
</body>
</html>