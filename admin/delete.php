<?php 
	include "db.php";
	session_start();
	if(isset($_POST['deleteMenu']) && $_SESSION['admin']){		
		$newConnect->delete('menu', $_POST['id']);
		header('Location:admin.php');
	}
	if(isset($_POST['deleteNews']) && $_SESSION['admin']){		
		$newConnect->delete('news', $_POST['id']);
		header('Location:admin.php');
	}
	mysqli_close($newConnect);
?>