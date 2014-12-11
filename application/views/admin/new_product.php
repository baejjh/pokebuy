	<div class="container">
	<h1>Add a New Product: Pokemon</h1>
	<h2>You are now an official Pokemon distributor</h2>
	<?php echo $this->session->flashdata('errors'); ?>
		<form id="admin_register_form" action="/new_product" method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<td><label for="name">Name:</label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>	
				<td><label for="description">Description:</label></td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				<td><label for="price">Price:</label></td>
				<td><input type="text" name="price">
			</tr>
			<tr>
				<td><label for="inventory_count">Inventory Count:</label></td>
				<td><input type="text" name="inventory_count"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add New Product"></td>
			</tr>
			</table>
		</form>
	</div>
</div><!-- close content div -->
</body>
</html>