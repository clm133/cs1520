<?php
	session_start();
	
	function sanitize_input($input, $link){ // I don't quite have a sanitization function yet, but if I did, it would be here
		return $input;
	}	
	
	if($_POST["newMessage"] != null){
		if($_POST["newMessage"] == 1){
			$_SESSION["dbMessage"] = null;
		}
	} 
	
	if($_POST["email"] != null){ //basically, there is no point in storing the message if there is no email input
		$servername = "localhost";
		$username = "root";
		$password = null;
		$db = "project";
		$link = new mysqli($servername, $username, $password, $db); //this is using the default login for phpmyadmin installed on my flashdrive, and obviously will need to be changed for use on another server
		
		if($link->connect_error){
			$_SESSION["dbMessage"] = ("Connection failed: ".$link->connect_error);
		}
		else{
			$name= sanitize_input($_POST["name"], $db);
			$email = sanitize_input($_POST["email"], $db);
			$message = sanitize_input($_POST["message"], $db);
			
			$sql = "INSERT INTO messages (name, email, message)
					VALUES ('$name', '$email', '$message');" ;
					
			if(mysqli_query($link, $sql)){
				$_SESSION["dbMessage"] = "Your message has been sent successfully!";
			}
			else{
				$_SESSION["dbMessage"] = "Something went wrong with sending your message. Please try again later.";
			}
		}
		mysqli_close($link);
	}
	header("Location: ../contact.php");
?>