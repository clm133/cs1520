<?php	
/* a function to find the next item in our order array */
	function getNextOrder($id){
		$keyList = array_keys($_SESSION["order"]); //array_keys() returns a list of all the keys in their current order in the $_SESSION["order"] array
		$cur = array_search($id, $keyList); //we can then find the index of the provided ID
		if($cur == (count($keyList) - 1)){ //if the current index is at the bottom of the order, we return the first id in the list of keys (AKA the top of the order).
			return $keyList[0];
		}
		else{ 
			return $keyList[$cur+1];
		}
	}
	
/* a function that returns the first creature in order */
	function getTopOrder(){
		$keyList = array_keys($_SESSION["order"]); //array_keys() returns a list of all the keys in their current order in the $_SESSION["order"] array
		return $keyList[0];
	}
	
/* a sorting function for uasort() to sort our $_SESSION["order"] array by a character's initiative value("iv") largest to smallest*/
	function sortByIV($a, $b) {
		if($a->iv < $b->iv){
			return 1;
		}
		else if($a->iv == $b->iv){
			return 0;
		}
		else{
			return -1;
		}
	}
	
/* a sorting function for uasort() to sort our $_SESSION["order"] array by a character's initiative value("iv") smallest to largest*/
	function sortByIVReverse($a, $b) { 
		if($a->iv < $b->iv){
			return -1;
		}
		else if($a->iv == $b->iv){
			return 0;
		}
		else{
			return 1;
		}
	}
	
/* a function that sets the initiative value of $a to be that of the initiative value of $b + 1 (effectively moving a character up in initiative) */
	function upOrder($a, $b){  
		$a->set_iv(($b->iv) + 1);
		uasort($_SESSION["order"], 'sortByIV');
	}
	
/* a function that sets the initiative value of $a to be that of the initiative value of $b - 1 (effectively moving a character down in initiative) */	
	function downOrder($a, $b){ 
		$a->set_iv(($b->iv) - 1);
		uasort($_SESSION["order"], 'sortByIV');
	}
	
/* This function adds creature-specific attributes to each row in the table*/
	function creatureRowAttributes($p1){
		if(isset($_SESSION["currentTurn"]) && $p1 == $_SESSION["currentTurn"]){
			echo "class='row creatureRow currentTurn panel accordian-toggle' data-toggle='collapse' data-target='#creatureOptions_$p1' ";
		}
		else{
			echo "class='row creatureRow panel accordian-toggle' data-toggle='collapse' data-target='#creatureOptions_$p1' ";
		}
	}
	
/* this function generates creature specific attributes for collapsable element */
	function hiddenRowAttributes($p1){
		echo "class='panel-collapse collapse' id='creatureOptions_$p1'";
	}
	
/* This function generates creature specific remove button */
	function removeButton($p1){
		echo "<button type='submit' class='btn btn-danger btn-sm' id='remove' name='remove' value='$p1'>";
		echo "<span class='btnText'>Remove from Order <span class='glyphicon glyphicon-remove'></span>";
		echo "</button>";
	}
	
/* This function generates creature specific upOrder button */
	function upOrderButton($p1){
		echo "<button type='submit' class='btn btn-primary btn-sm' id='moveUp' name='moveUp' value='$p1'>";
		echo "<span class='btnText'>Move Up <span class='glyphicon glyphicon-arrow-up'></span></span>";
		echo "</button>";
	}
	
/* This function generates creature specific downOrder button */
	function downOrderButton($p1){
		echo "<button type='submit' class='btn btn-primary btn-sm' id='moveDown' name='moveDown' value='$p1'>";
		echo "<span class='btnText'>Move Down <span class='glyphicon glyphicon-arrow-down'></span></span>";
		echo "</button>";
	}
	
/* This function generates a manageHealth button */
	function manageHealthButton($p1){
		echo "<button class='btn btn-primary btn-sm' id='manageHealth' data-toggle='modal' data-target='#healthModal_$p1'>";
		echo "<span class='btnText'>Manage Health <span class='glyphicon glyphicon-heart'></span></span>";
		echo "</button>";
	}
	
/* This function generates a viewStats button */
	function viewStatsButton($p1){
		echo "<button class='btn btn-primary btn-sm' id='viewStats'>";
		echo "View Stats <span class='glyphicon glyphicon-book'></span>";
		echo "</button>";
	}
?>