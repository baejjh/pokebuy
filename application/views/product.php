	

	<a href="/default_controller">Go Back</a>
	<div id="product_name">
 			<span data-title="Only $" . <?=$displayed_product['price'];?> . "!">
 				<h1>
					<?=$displayed_product['name'];?>
				</h1>
			</span>
	</div>
		<img src="<?= $displayed_product['image'][0]['location'] ?>" alt="Bulbasaur">
	<div class="right_div">
			$<?=$displayed_product['price'];?><br>
			<?=$displayed_product['description'];?><br>
		<form action="/add_cart/<?= $displayed_product['id']?>" method="post">
			<select name="qty">
				<?php for ($i=0; $i <= $displayed_product['inventory_count']; $i++) { ?>
					<option value="<?= $i ?>"><?= $i; ?></option>
				<?php } ?>
			</select>
			<input type="submit" value="BUY" class="submit">
		</form>
	</div>
	<h2>Similar Items</h2>
	<div class="bottom_div">
<?php 	foreach ($similar_products as $product) { ?>
			<?= $product['name'];?><br>
			<img src="<?= $product['location'];?>" alt=" Pokemon Pics!" height="200px" width="200px"><br>
			$<?= $product['price'];?><br>
			<?= $product['description'];?><br>
<?php 	} ?>
		</div>
	</div>
</div>
</body>
</html>