	<a href="/default_controller">Go Back</a>
 			<h1>
				<?=$products['name'];?>
			</h1>
	<div class="left_div">
		<!-- <img src="#" alt="main_photo">

		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo"> -->
	</div>
	<div class="right_div">
			$<?=$products['price'];?><br>
			<?=$products['description'];?><br>
		<form action="/add_cart/<?= $products['id']?>" method="post">
			<select name="qty">
				<?php for ($i=0; $i <= $products['inventory_count']; $i++) { ?>
					<option value="<?= $i ?>"><?= $i; ?></option>
				<?php } ?>
			</select>
			<input type="submit" name="BUYYYYYYYYY">
		</form>
	</div>
	<h2>Similar Items</h2>
	<div class="bottom_div">
<?php 	foreach ($category as $product) { ?>
			<?=$product['name'];?><br>
			$<?=$product['price'];?><br>
			<?=$product['description'];?><br>
<?php 	} ?>
		</div>
	</div>
</div>
</body>
</html>