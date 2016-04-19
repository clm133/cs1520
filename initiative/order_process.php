<?php
	include("creature.php");
	session_start();
	
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
		unset($_SESSION["order"][$_POST["remove"]]);
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