<?php
	function active_page($s){ //this function will help us highlight the current page in navbar
		$self = basename($_SERVER["PHP_SELF"]);
		if($s == $self){
			echo "class='active'";
		}
	}
?>

<div class="container">
	<!-- We are using bootstrap's awesome navbar template here-->
	<nav class="navbar navbar-custom">
	  <div class="container-fluid">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li <?php active_page("about.php")?>><a href="about.php">About</a></li>
			<li <?php active_page("index.php")?>><a href="index.php">Initiative Order</a></li>
			<li <?php active_page("dice_roller.php")?>><a href="dice_roller.php">Dice Roller</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li <?php active_page("contact.php")?>><a href="contact.php">Contact</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>