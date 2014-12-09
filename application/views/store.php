<!-- Not sure where to place this, does it go in the header? - KS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script type="text/javascript">
</script>
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
			<li><a href="category/<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
<?php	} ?>
		</ul>
<?php } ?>
	</div>

	<div class="products">
<?php if(!empty($products)) { ?>
		<h1><?php echo $products[0]['category'] ?> (page $page)</h1>
		<select>
		    <option value="volvo">Low Price</option>
		    <option value="saab">High Price</option>
		    <option value="mercedes">Most Popular</option>
		</select>
		*pagination

<?php }
	  if(!empty($products)) {
	  	foreach($products as $product) { ?>
	  	<div class="each_product">
			<!-- $products['main_image'] -->
			<?=$product['name']?>
			<?=$product['price']?><br><br>
			<?=$product['description']?>
			
		</div>
		}
<?php } ?>
	</div>
</div><!-- close content div -->
</body>
</html>