	<div id="product_div">
 		<!-- <span data-title="Only $" . ?= $displayed_product['price'];?> . "!"> -->
		<!-- </span> -->
		<img src="<?= $displayed_product['image'][0]['location'] ?>" alt="<?=$displayed_product['name'];?>" id="main_img">
	
		<div class="product_description_div">
		<h1><?=$displayed_product['name'];?></h1>
			<?= "$ " . $displayed_product['price'];?><br>
			<?=$displayed_product['description'];?><br>
		<form action="/add_cart/<?= $displayed_product['id']?>" method="post">
			<select name="qty">
				<?php for ($i=0; $i <= $displayed_product['inventory_count']; $i++) { ?>
					<option value="<?= $i ?>"><?= $i; ?></option>
				<?php } ?>
			</select>
			<input type="submit" value="BUY" class="submit">
		</form>

		<a href="/default_controller">Go Back</a>
		
		</div>
	</div>

	<div class="similar_items_div">
	<h2>Similar Items</h2>
		<?php 	foreach ($similar_products as $product) { ?>
		<div class="similar_item_single_div">
			<a class="product_name" href="/view_product/<?= $product['id'] ?>"><?= $product['name'] ?></a>
			<img src="<?= $product['location'];?>" alt=" Pokemon Pics!" id="similar_img"><br>
			$<?= $product['price'];?><br>
			<?= $product['description'];?><br>
		</div>
		<?php 	} ?>
	</div>
</div>
</body>
</html>git