	<div class="side_bar">
		<form action="/search_product/" method="post">
			<input type="text" placeholder="Product Name" name="name">
			<input type="submit" value="Search">
		</form>
		<h2>Categories</h2>
<?php if(!empty($categories)) {?>
			<ul>
<?php 	foreach($categories as $category) {	?>	
				<li><a href="/categories/<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
<?php	} ?>
			</ul>
<?php } ?>
	</div>
<?php echo $links ?>
	<div class="products">
<?php 	if(!empty($products[0]['category'])) { ?>
		<h1><?= $products[0]['category'] ?></h1>
		<a href="/default_controller">Do More Shopping!</a>
<?php	} ?>
		<select>
		    <option value="volvo">Low Price</option>
		    <option value="saab">High Price</option>
		    <option value="mercedes">Most Popular</option>
		</select>
	<?php 	if(!empty($products)) { 
			foreach($products as $product) { ?>
	  	<div class="each_product">
			<p><a href="/products_view/<?= $product['id'] ?>">
				<?= $product['name'] ?></a></p>
			<p>$<?= $product['price'] ?></p>
			 <!-- <p> $product['location'] </p>    <-*image?*    -->
			 <p><?= $product['description'] ?></p>
			 <form action="/add_cart/<?= $product['id']?>" method="post">
				<input type="submit" value="Buy">
			 </form>
		</div>
	<?php		}
			} ?>
</div>
</body>
</html>