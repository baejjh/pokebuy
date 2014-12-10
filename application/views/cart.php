	<table>
		<thead>
			<th>Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</thead>
		<tbody>
<?php	if(!empty($products)) {
			$sum = 0;
			foreach($products as $product) { 
				$sum += $product['subtotal']; ?>
			<tr>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $product['price'] ?></td>
				<td>
					<form action="update_quantity" method="post">
						<select name="qty">
<?php 			for($i=1; $i<=$product['inventory']; $i++) { ?>
							<option value="<?php echo $i ?>" <?php if($i == $product['qty']){echo 'selected'; } ?>><?php echo $i ?></option>
<?php			} ?>
						</select>
						<input type="hidden" name="rowid" value="<?php echo $product['rowid'] ?>">
						<input type="submit" value="Update Quantity">
					</form>
				</td>
				<td><?php echo $product['subtotal'] ?></td>
				<td> 
					<form action="delete" method="post">
						<input type="submit" name="delete" value="Delete Item From Cart">
						<input type="hidden" name="rowid" value="<?php echo $product['rowid'] ?>">
					</form>
				</td>
			</tr>
<?php		}
		} ?>
		</tbody>
		<tfoot>
			<tr>
				<th id="total" colspan="3" >Subtotal (Before Shipping and Tax):</th>
<?php 	if(!empty($products)) { ?>
				<th><?php echo $sum ?></th>
<?php 	} ?>
			</tr>
		</tfoot>
	</table>
	<a href="store">Continue Shopping</a>

	<form action="/submit_order" method="post">
		<h1>Shipping Information</h1>
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td>Address 2</td>
				<td><input type="text" name="address2"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city"></td>
			</tr>
			<tr>
				<td>State</td>
				<td>
					<select name="state">
<?php 	foreach($states as $state) { ?>
						<option value="<?php echo $state['id'] ?>"><?php echo $state['abbreviation'] ?></option>
<?php 	} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Zipcode</td>
				<td><input type="text" name="zip_code"></td>
			</tr>
		</table>

	<!-- <h1>Billing Information</h1>
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="billing_first_name"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="billing_last_name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="billing_address"></td>
			</tr>
			<tr>
				<td>Address 2</td>
				<td><input type="text" name="billing_address2"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="billing_city"></td>
			</tr>
			<tr>
				<td>State</td>
				<td>
					<select name="billing_state">
<?php 	foreach($states as $state) { ?>
						<option value="<?php echo $state['id'] ?>"><?php echo $state['abbreviation'] ?></option>
<?php 	} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Zipcode</td>
				<td><input type="text" name="billing_zip_code"></td>
			</tr>
		</table> -->
		<input type="submit" name="order" value="Order">
	</form>
</div><!-- close content div -->
</body>
</html>