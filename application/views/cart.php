	<table>
		<thead>
			<th>Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</thead>
		<tbody>
<?php	$sum = NULL;
		if(!empty($products)) {
			foreach($products as $product) { 
				$sum += $product['subtotal']; ?>
			<tr>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $product['price'] ?></td>
				<td>
					<form action="update_quantity" method="post">
						<select name="qty">
<?php 					for($i=1; $i<=$product['inventory']; $i++) { ?>
							<option value="<?php echo $i ?>" <?php if($i == $product['qty']){echo 'selected'; } ?>><?php echo $i ?></option>
<?php					} ?>
						</select>
						<input type="hidden" name="rowid" value="<?php echo $product['rowid'] ?>">
						<input type="submit" value="Update Quantity">
					</form>
				</td>
				<td><?php echo number_format($product['subtotal'], 2) ?></td>
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
<?php 		if(!empty($products)) { ?>
				<th><?php echo number_format($sum, 2) ?></th>
<?php 		} ?>
			</tr>
		</tfoot>
	</table>
	<div class="pagination_div"><a href="store">Continue Shopping</a></div>

	<form action="/submit_order" method="post" id="payment-form" class="customer_info">
	<table>
		<h1>Shipping Information</h1>
<?php 	if(!empty($errors)) {
		echo $errors;
} ?>
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
<?php 				foreach($states as $state) { ?>
					<option value="<?php echo $state['id'] ?>"><?php echo $state['abbreviation'] ?></option>
<?php 				} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Zipcode</td>
			<td><input type="text" name="zip_code"></td>
		</tr>
	</table>

	<p>Billing address is the same as shipping:
	<input type="checkbox" name="same_ship_bill_address" id="same_ship_bill_address"></p>

	<h1>Billing Information</h1>

	<script type="text/javascript">
		$(document).ready(function() {
			//if button clicked
			$('#same_ship_bill_address').is(":checked", function() {
				console.log('check');
			    html('<table class="customer_info_hidden">');
			//if button not clicked    
				else html('<table class="customer_info"');
			});
		});
	</script>
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
	</table>

	<!-- Stripe form -->
	<span class="payment-errors"></span>
  	<div class="form-row">
    	<label>
      		<span>Card Number</span>
      		<input type="text" size="20" data-stripe="number"/>
    	</label>
  	</div>
  	<div class="form-row">
    	<label>
      		<span>CVC</span>
     		<input type="text" size="4" data-stripe="cvc"/>
    	</label>
  	</div>
  	<div class="form-row">
    	<label>
      		<span>Expiration (MM/YYYY)</span>
      		<input type="text" size="2" data-stripe="exp-month"/>
    	</label>
    	<span> / </span>
   		<input type="text" size="4" data-stripe="exp-year"/>
  	</div>
  	<!-- End of stripe form -->
		<button type="submit">Submit Payment</button>
	<input type = "hidden" name="total" value="<?php echo $sum ?>">
	</form>
</div><!-- close content div -->
</body>

<script type="text/javascript">
	Stripe.setPublishableKey('pk_test_pBcVNYkh8vhIxl0iLGTGl63k');

	jQuery(function($) {
		$('#payment-form').submit(function(event) {
			var $form = $(this);
			$form.find('button').prop('disabled', true);
			Stripe.card.createToken($form, stripeResponseHandler);
			return false;
		});
	});

	function stripeResponseHandler(status, response) {
		var $form = $('#payment-form');
		if (response.error) {
			$form.find('.payment-errors').text(response.error.message);
			$form.find('button').prop('disabled', false);
		} else {
			var token = response.id;
			$form.append($('<input type="hidden" name="stripeToken" />').val(token));
			$form.get(0).submit();
			}
		};
</script>
</html>