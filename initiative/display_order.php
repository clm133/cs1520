
<div class="container col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Current Order</h4></div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<th>Creature Name</th>
					<th>Initiative Value</th>
					<th>Move Up/Down?</th>
					<th>Remove?</th>
				</tr>
				<?php
					if(isset($_SESSION["order"])){
						foreach($_SESSION["order"] as $currCreature){
							$name = $currCreature->name;
							$iv = $currCreature->iv;
							$hp = $currCreature->hp;
							$id = $currCreature->id;
							echo "<tr>";
								echo "<td>$name</td>";
								echo "<td>";
								echo $iv;
								echo "</td>";
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
	</div>
</div>