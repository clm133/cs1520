<?php
	session_start();
	
	function sortByIV($a, $b) { //a sorting function for uasort() to sort our $_SESSION["order"] array by a character's initiative value("iv") largest to smallest
		if($a['iv'] < $b['iv']){
			return 1;
		}
		else if($a['iv'] == $b['iv']){
			return 0;
		}
		else{
			return -1;
		}
	}
	
	function sortByIVReverse($a, $b) { //a sorting function for uasort() to sort our $_SESSION["order"] array by a character's initiative value("iv") smallest to largest
		if($a['iv'] < $b['iv']){
			return -1;
		}
		else if($a['iv'] == $b['iv']){
			return 0;
		}
		else{
			return 1;
		}
	}
	
	function upOrder($a, $b){  //a function that augments the initiative value of $a to be that of the initiative value of $b + 1 (effectively moving a character up in initiative)
		$_SESSION["order"][$a]["iv"] = $_SESSION["order"][$b]["iv"]+1;
		uasort($_SESSION["order"], 'sortByIV');
	}
	
	function downOrder($a, $b){ //a function that augments the initiative value of $a to be that of the initiative value of $b - 1 (effectively moving a character down in initiative)
		$_SESSION["order"][$a]["iv"] = $_SESSION["order"][$b]["iv"]-1;
		uasort($_SESSION["order"], 'sortByIV');
	}
	
	if($_SESSION["active"] != 1){ //makes sure session is marked as active
		$_SESSION["active"] = 1;
	}
	
	if($_POST["newhp"] != null){
		$_SESSION["order"][$_POST["creatureName"]]["hp"] = $_POST["newhp"];
	}
	
	if($_POST["cName"] != null){ //adds new creatures to the order
			if($_SESSION["order"] == null){
				$_SESSION["order"] = array($_POST["cName"] => array("iv" => $_POST["iv"], "hp" => $_POST["hp"]));
			}
			else{
				$arr = $_SESSION["order"];
				$arr[$_POST["cName"]]["iv"] = $_POST["iv"];
				$arr[$_POST["cName"]]["hp"] = $_POST["hp"];
				uasort($arr, 'sortByIV');
				$_SESSION["order"] = $arr;
			}
	}
	
	if($_POST["remove"] != null){ //removes creatures from the order
		unset($_SESSION["order"][$_POST["remove"]]);
	}
	
	if($_GET["m"] == "u"){ //moves creature up in the order
		$cur;
		$prev;
		foreach($_SESSION["order"] as $key => $value){
			if($cur != null){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_GET["c"]){
				if($prev != null){
					upOrder($cur, $prev);
				}
				break;
			}
		}
	}
	else if($_GET["m"] == "d"){ //moves creature down in the order
		uasort($_SESSION["order"], 'sortByIVReverse');
		$cur;
		$prev;
		foreach($_SESSION["order"] as $key => $value){
			if($cur != null){
				$prev = $cur;
			}
			$cur = $key;
			if($cur == $_GET["c"]){
				if($prev != null){
					downOrder($cur, $prev);
				}
				break;
			}
		}
	}
	
	header("Location: ../index.php");
?>