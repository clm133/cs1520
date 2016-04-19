<?php
	session_start();
	include("dice/display_dice.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dice Roller</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<header class="navbar"> 
			<?php
				include("navbar.php");
			?>
		</header>
		<div class="container">
		<div class="container col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Dice Roller</h4></div>
				<div class="panel-body">
					<form action="dice/dice_process.php" method="post">
						<div class="form-group">
							<label for="d4">d4</label>
							<input type="text" name="d4" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d6">d6</label>
							<input type="text" name="d6" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d8">d8</label>
							<input type="text" name="d8" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d10">d10</label>
							<input type="text" name="d10" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d12">d12</label>
							<input type="text" name="d12" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d20">d20</label>
							<input type="text" name="d20" class="form-control" placeholder="# of dice rolled">
						</div>
						<div class="form-group">
							<label for="d100">d100</label>
							<input type="text" name="d100" class="form-control" placeholder="# of dice rolled">
						</div>
						<button type="submit" class="btn btn-primary">Roll 'Em</button>
					</form>
				</div>
			</div>
		</div>
			<div class="container col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Results</h4></div>
					<div class="panel-body">
						<?php
							if( !(isset($_SESSION["diceSum"]))){
								echo "<p>Enter the number of dice you wish to roll in the corresponding box under 'Dice Roller'.</p>";
							}
							else{				
								if(isset($_SESSION["d4"])){
									display_dice_table("d4");
								}
								if(isset($_SESSION["d6"])){
									display_dice_table("d6");
								}
								if(isset($_SESSION["d8"])){
									display_dice_table("d8");
								}
								if(isset($_SESSION["d10"])){
									display_dice_table("d10");
								}
								if(isset($_SESSION["d12"])){
									display_dice_table("d12");
								}
								if(isset($_SESSION["d20"])){
									display_dice_table("d20");
								}
								if(isset($_SESSION["d100"])){
									display_dice_table("d100");
								}
							}
						?>
					</div>
					<div class="panel-footer">
					<h4>Total: </h4>
					<?php
						if(isset($_SESSION["diceSum"])){
							echo "<p>".$_SESSION["diceSum"]."</p>";
						}
						else{
							echo "<p>The sum total of all dice rolled will appear here.</p>";
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>