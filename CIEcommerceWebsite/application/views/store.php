<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Store | Dojo eCommerce</title>

	<style type="text/css">
		.each_product {
			display: inline-block;
			vertical-align: top;
		}
	</style>
</head>
<body>
	<? require('include/shopping_header.php')	?>

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
	  foreach($products as $product) {
	var_dump($product);
} ?>
		<div class="each_product">
			$products['main_image'];
			$products['price'];
			$products['name'];
		</div>

		*pagination
	</div>
</body>
</html>