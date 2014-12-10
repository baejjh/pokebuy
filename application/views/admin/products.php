	<h1>Products</h1>
		<h2>Add Product works but no images</h2>
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
	
	<!-- pagination starts here -->
	<?= "<div class='pagination'>" . $pagination_links . "</div>"; ?>

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
			<td> $each_product['main_image']; </td>
			<td><?= $each_product['id']; ?></td>
			<td><?= $each_product['name']; ?></td>
			<td><?= $each_product['inventory_count']; ?></td>
			<td><?= $each_product['quantity_sold']; ?></td>
			<td>
				<a href="#openModal">Edit</a>
				<a href="delete_product/<?= $each_product['id']; ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>

	</tbody>
	</table>
</div><!-- close content div -->

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
			<td><input type="button" value="Edit Product Information"></td>
		</tr>
		</table>
 	</form>
    </div>
</div>

</body>
</html>