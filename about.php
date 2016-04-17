<!DOCTYPE html>
<html>
	<head>
		<title>Taking Initiative</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="navbar"> 
			<?php
				include("navbar.php");
			?>
		</header>
		<div class="container">
			<div class="container col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>About</h4></div>
					<div class="panel-body">
						<p>
							This is a project for the Spring 2016 semester of CS1520 at the University of Pittsburgh. It is developed by
							student Charles Mietzner. The primary function of the project is to record and track some commonly used 
							tabletop RPG variables and, hopefully, get a decent grade.
						</p>
						<p>
							This project uses a combination of the Bootstrap framework and the languages learned in the first half of this semester which includes
							php, sql, and a small amount of javascript. 
						</p>
					</div>
				</div>
			</div>
			<div class="container col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Current Features</h4></div>
					<div class="panel-body">
						<p>Currently, this project is capable of the following:</p>
						<ul>
							<li>Maintaining a list of the intiative order (or "turn order").</li>
							<li>Altering that initiative order, by either adding/removing creatures to the order or moving around creatures already in the order.</li>
							<li>Maintaing and updating the health stat of all creatures in the order.</li>
							<li>Rolling any number of 4-sided, 6-sided, 8-sided, 10-sided, 12-sided, 20-sided, or 100-sided die and determining a sum total.</li>
							<li>A contact page, where a visitor to the site is able to leave their name, email, and a short message that is sent to a database.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<body>
</html>