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
				<td><input type="password" name="description"></td>
			</tr>
			<tr>
				<td><label for="price">Price:</label></td>
				<td><input type="password" name="price">
			</tr>
			<tr>
				<td><label for="inventory_count">Inventory Count:</label></td>
				<td><input type="text" name="inventory_count"></td>
			</tr>
			<tr>
				<td><label for="quantity_sold">Quantity Sold:</label></td>
				<td><input type="text" name="quantity_sold"></td>
			</tr>
			<tr>
				<td><label for="main_image">Main Image:</label></td>
				<td><?php echo form_open_multipart('upload_controller/do_upload');?>
					<?php echo "<input type='file' name='userfile' size='50'/ name='main_image'>";?></td>
			</tr>
			<?php for ($i=0; $i < 3; $i++) { ?>
			<tr>
				<td>Other Images (optional):</td>	
				<td>
					<?php echo form_open_multipart('upload_controller/do_upload');?>
					<?php echo "<input type='file' name='userfile' size='50'/>";?>
				</td>	
			</tr>
			<?php } ?>
			<tr>
				<td></td>
				<td><input type="submit" value="Add New Product"></td></td>
			</tr>
			</table>
		</form>
	</div>
</div><!-- close content div -->
</body>
</html>