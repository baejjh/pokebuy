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