	<div class="side_bar">
		<form>
			<input type="text" placeholder="Product Name">
			<input type="submit" value="Search">
		</form>

		<h2>Categories</h2>
		<ul>
			<li>$category['name']</li>
		</ul>
	</div>

	<div class="products">
		<h1>$category['name'] (page $page)</h1>
		<select>
		    <option value="volvo">Low Price</option>
		    <option value="saab">High Price</option>
		    <option value="mercedes">Most Popular</option>
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