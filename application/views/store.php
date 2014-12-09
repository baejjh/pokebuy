	<div class="side_bar">
		<form>
			<input type="text" placeholder="Product Name">
			<input type="submit" value="Search">
		</form>

		<a href="register">Login as Admin</a>

		<h2>Categories</h2>
		<ul>
			<li>$category['name']</li>
		</ul>
	</div>

	<div class="products">
		<h1>$category['name'] (page $page)</h1>
		<select>
		    <option value="">Lowest Price</option>
		    <option value="">Highest Price</option>
		    <option value="">Most Popular</option>
		</select>
		*pagination

		<div class="each_product">
			$products['main_image'];
			$products['price'];
			$products['name'];
		</div>

		*pagination
	</div>
</div><!-- close content div -->	
</body>
</html>