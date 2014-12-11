
		<?php if(!isset($name)){ $name = ''; } ?>
<div class="side_bar">
	<form action="/order_by" method="post">
		<input type="text" placeholder="Product Name" name="word_search" value="<?= $name?>">
			<h2>Categories</h2>
<?php if(!empty($this->session->userdata('categories')))
	  	{ ?>
<?php 		foreach($this->session->userdata('categories') as $category)
			{	?>	
				<input type="radio" name="category" value="<?= $category['id'] ?>"><?= $category['name'] ?><br>
<?php 		} ?>
<?php 	} ?>
		<select name="selected_order">
			<option value="">(Order Selection)</option>
		    <option value="low_price">Lowest Price First</option>
		    <option value="high_price">Highest Price</option>
		    <option value="most_popular">Most Popular</option>
		</select>
		<input type="submit">
	</form>
	
	<a href="/default_controller">I want ALL the POKéMON! Go Back!</a>
</div>
<?php echo $links ?>
<div class="products"> 
	</form>
<?php 	if(!empty($products))
		{ 
			foreach($products as $product)
			{ ?>
  				<div class="each_product" stuff="<?= $product['id']?>">
					<p>	
						<a href="/view_product/<?= $product['id'] ?>">
							<?= $product['name'] ?>
						</a>
					</p>
					<p>
						$<?= $product['price'] ?>
					</p>
		 <!-- <p> $product['main_image_id'] </p>    <-*image?*    -->
		 <p>
		 	<?= $product['description'] ?>
		 </p>
		 <form action="/add_cart/<?= $product['id']?>" method="post">
			<input type="submit" value="Buy">
		 </form>
	</div>
<?php		}
		} ?>
</div>
</body>
</html>