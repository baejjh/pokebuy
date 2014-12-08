<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products | Dojo eCommerce</title>

	<style type="text/css">
		.each_product {
			display: inline-block;
			vertical-align: top;
		}
	</style>
</head>
<body>
	<? require('include/shopping_header.php')	?>
	<a href="#">Go Back</a>
	<h1>$products['name'];</h1>
	<div class="left_div">
		<img src="#" alt="main_photo">

		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
	</div>
	<div class="right_div">
		$products['description'];
		<form>
			<select>
				<option>$products['quantity'];</option>
				<option>$products['quantity'];</option>
				<option>$products['quantity'];</option>
			</select>
			<input type="submit" name="BUYYYYYYYYY">
		</form>
	</div>

	<h2>Similar Items</h2>
	<div class="bottom_div">
		<div class="each_product">
			$products['main_image'];
			$products['price'];
			$products['name'];
		</div>
	</div>
</body>
</html>