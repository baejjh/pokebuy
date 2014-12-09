<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Store | Dojo eCommerce</title>

<style type="text/css">
* {
	font-family: sans-serif;
	vertical-align: top;
	margin: 5px auto;
}
.each_product {
	display: inline-block;
	vertical-align: top;
	height: 200px;
	width: 200px;
	border: 3px solid blue;
}
.pagination_links {
	border: 1px solid black;
	border-radius: 2px;
}
.side_bar {
	width: 25%;
}
.products {
	width: 75%;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script type="text/javascript">
</script>
</head>
<body>
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
	  foreach($products as $product) { ?>
	  	<div class="each_product">
			<!-- $products['main_image'] -->
			<?=$product['name']?>
			<?=$product['price']?><br><br>
			<?=$product['description']?>
			
		</div>
<?php } ?>
	</div>
</body>
</html>