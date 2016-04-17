<?php
	session_start();
	
	$sum = 0;
	unset($_SESSION["d4"]);
	if($_POST["d4"] != null){
		$_SESSION["d4"] = array();
		for($i=0; $i < $_POST["d4"]; $i++){
			$roll = rand(1,4);
			$_SESSION["d4"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d6"]);
	if($_POST["d6"] != null){
		$_SESSION["d6"] = array();
		for($i=0; $i < $_POST["d6"]; $i++){
			$roll = rand(1,6);
			$_SESSION["d6"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d8"]);
	if($_POST["d8"] != null){
		$_SESSION["d8"] = array();
		for($i=0; $i < $_POST["d8"]; $i++){
			$roll = rand(1,8);
			$_SESSION["d8"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d10"]);
	if($_POST["d10"] != null){
		$_SESSION["d10"] = array();
		for($i=0; $i < $_POST["d10"]; $i++){
			$roll = rand(1,10);
			$_SESSION["d10"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d12"]);
	if($_POST["d12"] != null){
		$_SESSION["d12"] = array();
		for($i=0; $i < $_POST["d12"]; $i++){
			$roll = rand(1,12);
			$_SESSION["d12"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d20"]);
	if($_POST["d20"] != null){
		$_SESSION["d20"] = array();
		for($i=0; $i < $_POST["d20"]; $i++){
			$roll = rand(1,20);
			$_SESSION["d20"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	unset($_SESSION["d100"]);
	if($_POST["d100"] != null){
		$_SESSION["d100"] = array();
		for($i=0; $i < $_POST["d100"]; $i++){
			$roll = rand(1,100);
			$_SESSION["d100"][] = $roll;
			$sum = $sum + $roll;
		}
	}
	if($sum > 0){
		$_SESSION["diceSum"] = $sum;
	}
	
	header("Location: ../dice_roller.php");
?>