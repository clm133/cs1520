<?php
	session_start();
	
	if($_SESSION["active"] == 1){
			session_destroy();
	}
	else{
		$_SESSION["active"] = 1;
	}
	header("Location: ../index.php");
?>