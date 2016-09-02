<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	 <script src="../ckeditor/ckeditor.js"></script>
	<style type="text/css">
		.container{
			margin:50px auto;
		}
	</style>
</head>
<body>
<?php 
session_start();
/* =======================add Menu ================*/
if(isset($_POST['addMenu']) && $_SESSION['admin']){
?>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<form action="" method="POST" role="form">			
				<div class="form-group">
					<input type="text" class="form-control" name="menu" placeholder="Add Menu">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="link" placeholder="Add Link">
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="addM">Add</button>
				<button type="submit" class="btn btn-default pull-left" name="back">Back</button>
			</form>
		</div>
	</div>
<?php }
	if(isset($_POST['addM'])){
		include "db.php";
		$menu=$_POST['menu'];
		$link=$_POST['link'];
		$newConnect->insert("menu","name, link", "'$menu', '$link'");
		header("Location:admin.php");
	}
/* ================= add News =====================*/
if(isset($_POST['addNews']) && $_SESSION['admin']){
?>
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<form action="" method="POST" role="form" enctype="multipart/form-data">	
				<div class="form-group">
					<label>Author</label>
					<textarea class="form-control" name="auther" rows='1'></textarea>
				</div>
				<div class="form-group">
					<label class="block">İmage</label>
					<input type="file" name="image">
				</div>
				<div class="form-group">
					<label>Text</label>
					<textarea class="form-control ckeditor" name="maintext"  rows='10'></textarea> 
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="addN">Add</button>
				<button type="submit" class="btn btn-default pull-left" name="back">Back</button>
			</form>
		</div>
	</div>
	<?php }
		if(isset($_POST['addN'])){
			include "db.php";
			$auther = $_POST['auther'];
			$text = $_POST['maintext'];
		    $picture = $_FILES["image"];
			$pic_file = date('dmYGis').basename($picture["name"]);
		    $pic_dir = "../images/".$pic_file;
		    move_uploaded_file($picture["tmp_name"], $pic_dir);
		    chmod($pic_dir, 0755); 
			 $newConnect->insert("news","maintext, image, created_by", "'$text','$pic_file', '$auther'");
			header("Location:admin.php");
		}



	if(isset($_POST['back'])){
		unset($_SESSION['id']);
		header("Location:admin.php");
	}
?>
</body>
</html>

