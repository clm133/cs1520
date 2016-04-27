<?php
	include("creature.php");
	session_start();
	
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
	
	function upOrder($a, $b){  //a function that augments the initiative value of $a to be that of the initiative value of $b + 1 (effectively moving a character up in initiative)
		$a->set_iv(($b->iv) + 1);
		uasort($_SESSION["order"], 'sortByIV');
	}
	
	function downOrder($a, $b){ //a function that augments the initiative value of $a to be that of the initiative value of $b - 1 (effectively moving a character down in initiative)
		$a->set_iv(($b->iv) - 1);
		uasort($_SESSION["order"], 'sortByIV');
	}
	
	if($_SESSION["active"] != 1){ //makes sure session is marked as active
		$_SESSION["active"] = 1;
	}
	
	if(isset($_POST["newhp"])){
		$_SESSION["order"][$_POST["creatureName"]]["hp"] = $_POST["newhp"];
	}
	
	/* Adds a new creautre to the order */
	if(isset($_POST["creatureName"])){ 
			if(!isset($_SESSION["order"])){
				$_SESSION["id_assignment"] = 0;
				$ctr = new Creature($_POST["creatureName"], $_POST["iv"], $_POST["hp"], $_SESSION["id_assignment"]);
				$_SESSION["order"] = array();
				$_SESSION["order"][$ctr->id] = $ctr;
			}
			else{
				$_SESSION["id_assignment"]++;
				$ctr = new Creature($_POST["creatureName"], $_POST["iv"], $_POST["hp"], $_SESSION["id_assignment"]);
				$_SESSION["order"][$ctr->id] = $ctr;
				uasort($_SESSION["order"], 'sortByIV');
			}
	}
	
	/* removes creatures from the order */
	if(isset($_POST["remove"])){
		if($_POST["remove"] == $_SESSION["currentTurn"]){ //if the current turn is set to the creature to be removed
			$_SESSION["currentTurn"] = getNextOrder($_POST["remove"]);
		}
		unset($_SESSION["order"][$_POST["remove"]]);
	}
	
	/* Begin current turn at top of the order */
	if($_POST["advanceOrder"] == "1"){
		$_SESSION["currentTurn"] = getTopOrder();
	}
	
	/* Advances the current turn*/
	if($_POST["advanceOrder"] == "2"){
		if(!isset($_SESSION["currentTurn"])){
			$_SESSION["currentTurn"] = getTopOrder();
		}
		else{
			$_SESSION["currentTurn"] = getNextOrder($_SESSION["currentTurn"]);
		}
	}
	
	/* Moves creature Up in the order */
	if($_GET["m"] == "u"){ 
		foreach($_SESSION["order"] as $key => $value){
			if(isset($cur)){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_GET["c"]){
				if(isset($prev)){
					upOrder($_SESSION["order"][$cur], $_SESSION["order"][$prev]);
				}
				break;
			}
		}
	}
	
	/* Moves Creature Down in the Order*/
	else if($_GET["m"] == "d"){ 
		uasort($_SESSION["order"], 'sortByIVReverse');
		foreach($_SESSION["order"] as $key => $value){
			if(isset($cur)){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_GET["c"]){
				if(isset($prev)){
					downOrder($_SESSION["order"][$cur], $_SESSION["order"][$prev]);
				}
				break;
			}
		}
	}
	
	header("Location: ../index.php");
?>