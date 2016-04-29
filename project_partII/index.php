<?php
	include("initiative/creature.php");
	session_start();
	include("initiative/order_functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Initiative Order</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
	</head>
	<body>
		<header class="navbar"> 
			<?php
				include("navbar.php");
			?>
		</header>
		<div class="container">
		<?php
			include("initiative/display_order.php");
			include("initiative/add_to_order.php");
			include("initiative/start_new_order.php");
		?>
		</div>
	<script src="js/jquery-1.12.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>
	<body>
</html>