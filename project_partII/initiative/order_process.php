<?php
	include("creature.php");
	session_start();
	include("order_functions.php");
	
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
	
	/* damages current health of creature */
	if(isset($_POST["dmgHealthValue"])){
		$newHp = $_SESSION["order"][$_POST["hiddenId"]]->currHp - $_POST["dmgHealthValue"];
		$_SESSION["order"][$_POST["hiddenId"]]->set_curr_hp($newHp);
	}
	
	/* damages current health of creature */
	if(isset($_POST["healHealthValue"])){
		$newHp = $_SESSION["order"][$_POST["hiddenId"]]->currHp + $_POST["healHealthValue"];
		$_SESSION["order"][$_POST["hiddenId"]]->set_curr_hp($newHp);
	}
	
	/* removes creatures from the order */
	if(isset($_POST["remove"])){
		if($_POST["remove"] == $_SESSION["currentTurn"]){ //if the current turn is set to the creature to be removed
			$_SESSION["currentTurn"] = getNextOrder($_POST["remove"]);
		}
		unset($_SESSION["order"][$_POST["remove"]]);
	}
	
	/* Begin current turn at top of the order */
	if($_POST["advanceOrder"] == "start"){
		$_SESSION["currentTurn"] = getTopOrder();
	}
	
	/* Advances the current turn*/
	if($_POST["advanceOrder"] == "next"){
		if(!isset($_SESSION["currentTurn"])){
			$_SESSION["currentTurn"] = getTopOrder();
		}
		else{
			$_SESSION["currentTurn"] = getNextOrder($_SESSION["currentTurn"]);
		}
	}
	
	/* Moves creature Up in the order */
	if(isset($_POST["moveUp"])){ 
		foreach($_SESSION["order"] as $key => $value){
			if(isset($cur)){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_POST["moveUp"]){
				if(isset($prev)){
					upOrder($_SESSION["order"][$cur], $_SESSION["order"][$prev]);
				}
				break;
			}
		}
	}
	
	/* Moves Creature Down in the Order*/
	else if(isset($_POST["moveDown"])){ 
		uasort($_SESSION["order"], 'sortByIVReverse');
		foreach($_SESSION["order"] as $key => $value){
			if(isset($cur)){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_POST["moveDown"]){
				if(isset($prev)){
					downOrder($_SESSION["order"][$cur], $_SESSION["order"][$prev]);
				}
				break;
			}
		}
	}
	
	header("Location: ../index.php");
?>