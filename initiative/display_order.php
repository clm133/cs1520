
<div class="container col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Current Order</h4></div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<th>Creature Name</th>
					<th>Health</th>
					<th>Initiative Value</th>
					<th>Move Up/Down?</th>
					<th>Remove?</th>
				</tr>
				<?php
					if(isset($_SESSION["order"])){
						foreach($_SESSION["order"] as $currCreature){
							$name = $currCreature->name;
							$iv = $currCreature->iv;
							$currHp = $currCreature->currHp;
							$id = $currCreature->id;
							if($id == $_SESSION["currentTurn"]){
								echo "<tr class='success'>";
							}
							else{
								echo "<tr>";
							}
								echo "<td>$name</td>";
								echo "<td>$currHp</td>";
								echo "<td>$iv</td>";
								echo "<td>";
								echo "<a href='initiative/order_process.php?m=u&c=$id'><span class='glyphicon glyphicon-arrow-up'></span></a>";
								echo "<a href='initiative/order_process.php?m=d&c=$id'><span class='glyphicon glyphicon-arrow-down'></span></a>";
								echo "</td>";
								echo "<td>
										<form action='initiative/order_process.php' method='post'>
											<button type='submit' class='btn btn-danger btn-sm' name='remove' value='$id'>
												Remove from Order
											</button>
										</form>
									 </td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</div>
		<div class="panel-footer">
			<form action="initiative/order_process.php" method="POST">
				<button type="submit" class="btn btn-primary" name="proceed" value="1">
					Next Turn <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</button>
			</form>
		</div>
	</div>
</div>