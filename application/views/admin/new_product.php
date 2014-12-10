	<?php echo $this->session->flashdata('errors'); ?>
	<div class="container">
		<form id="admin_register_form" action="/new_product" method="post" enctype="multipart/form-data">
			<h3>Add New Product</h3>
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
			<?php } ?>
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