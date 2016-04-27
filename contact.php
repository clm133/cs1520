<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
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
			<div class="container col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Contact</h4></div>
					<div class="panel-body">
						<?php
							if( isset($_SESSION["dbMessage"])){
								echo "<p>".$_SESSION["dbMessage"]."</p>";
								echo "<form action='contact/contact_process.php' method='post'>
										<button type='submit' class='btn btn-primary btn-sm' name='newMessage' value='1'>
											New Message
										</button>
									</form>";
							}
							else{
								include("contact/contact_form.php");
							}
						?>
					</div>
				</div>
		</div>
	<body>
</html>