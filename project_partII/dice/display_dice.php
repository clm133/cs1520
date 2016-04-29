<?php
function display_dice_table($dice){
	echo "<div class='container col-sm-6'>
			<h4>$dice</h4>
			<table class='table table-bordered'>";
					$len = count($_SESSION["$dice"]);
					echo "<tr>";
						for($i = 1; $i<$len + 1; $i++){
							echo "<th>Roll #";
							echo $i;
							echo "</th>";
						}
						echo "<th>Sum</th>";
					echo "</tr><tr>";
					$sum = 0;
					for($i = 0; $i<$len; $i++){
							echo "<td>";
							$sum = $sum + $_SESSION["$dice"][$i];
							echo $_SESSION["$dice"][$i];
							echo "</td>";
						}
						echo "<td class='dice_sum'>$sum</td>";
					echo "</tr>";
	echo 	'</table>
		</div>';
}

?>