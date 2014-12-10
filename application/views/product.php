	<a href="/default_controller">Go Back</a>
	<h1><?=$display['name'];?></h1>
	<div class="left_div">
		<!-- <img src="#" alt="main_photo">

		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo">
		<img src="#" alt="side_photo"> -->
	</div>
	<div class="right_div">
		<?=$display['description'];?>
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
		<!-- <div class="each_product">
<?php 		for($i=0; $i<6; $i++) { ?>
			<?=$products['name'];?><br>
			<?=$products['price'];?><br>
			<?=$products['description'];?><br>
<?php 		} ?>
		</div> -->
	</div>
</div><!-- close content div -->
</body>
</html>