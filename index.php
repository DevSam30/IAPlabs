<?php
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
	<script src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="placeholder.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
</head>
<body>

	<h3>It is time to communicate with the exposed API, all we need is the API key to be passed in the header</h3>
	<hr>
	<h4>Feature 1- Placing an order</h4>
	<hr>
	<form name="order_form" id="order_form">
		<fieldset>
			<legend>Place order</legend>
			<input type="text" name="name_of_food" id="name_of_food" required placeholder="name of food"/><br>

			<input type="number" name="number_of_units" id="number_of_units" required placeholder="number of units"/><br>

			<input type="number" name="unit_price" id="unit_price" required placeholder="unit price" value="order placed" /><br><br>

			<button type="submit">Place Order</button>

		</fieldset>
	</form>

	<hr>
	<h4>2. Feature 2 - Checking Order Status</h4>
	<hr>
	<form name="order_status_form" id="order_status_form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<fieldset>
			<legend>check order status</legend>
			<input type="number" name="order_id" id="order_id" required placeholder="order ID"/><br><br>

			<button type="submit">Check order status</button>
		</fieldset>
	</form>

</body>
</html>