<!-- Not sure where to place this, does it go in the header? - KS -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script type="text/javascript">
</script> -->
<!-- End of code in that statement -->
		<div class="side_bar">
		<form>
			<input type="text" placeholder="Product Name">
			<input type="submit" value="Search">
		</form>
		<h2>Categories</h2>
<?php if(!empty($categories)) {?>
		<ul>
<?php 	foreach($categories as $category) {	?>	
			<li><a href="/categories/<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
<?php	} ?>
		</ul>
<?php } ?>
	</div>

	<div class="products">
<?php 	if(!empty($products[0]['category'])) { ?>
		<h1><?php echo $products[0]['category'] ?></h1>
<?php	} ?>
		<select>
		    <option value="volvo">Low Price</option>
		    <option value="saab">High Price</option>
		    <option value="mercedes">Most Popular</option>
		</select>
	</div>
<?php 	if(!empty($products)) { 
			foreach($products as $product) { ?>
	  	<div class="each_product">
			<p><a href="/products_view/<?= $product['id'] ?>">
				<?= $product['name'] ?></a></p>
			<p><?= $product['price'] ?></p>
			 <!-- <p> $product['location'] </p>    <-*image?*    -->
			 <p><?= $product['description'] ?></p>
			 <form action="/buy/<?= $product['id']?>" method="post">
				<input type="submit" value="Buy">
			 </form>
		</div>
<?php		}
		} ?>
</div><!-- close content div -->
</body>
</html>