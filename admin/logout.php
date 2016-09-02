<?php
session_start();
	if($_SERVER['REQUEST_METHOD'] === "POST" && $_SESSION['admin'] ==true) {
		if (isset($_POST['logout'])) {
			unset($_SESSION['admin']);
			session_destroy();
			header("Location:../index.php");
		}
	}
	else{
		header("Location:../index.php");
	}


?>