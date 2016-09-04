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
include "db.php";
session_start();
 /* ===================Update News=====================*/
if(isset($_POST['updateMenu']) && $_SESSION['admin']){
?>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<?php 
				$_SESSION['idMenu']=$_POST['id'];
				$query=$newConnect->select('menu','*', $_POST['id']);
				$row = mysqli_fetch_assoc($query);
			?>
			<form action="" method="POST" role="form">			
				<div class="form-group">
				<textarea class="form-control" name="menu" rows='5'><?php echo $row['name'];?></textarea>
				</div>
				<div class="form-group">
				<textarea class="form-control" name="link" rows='5'><?php echo $row['link'];?></textarea>
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="updateM">Update</button>
				<button type="submit" class="btn btn-default pull-left" name="back">Back</button>
			</form>
		</div>
	</div>
	<?php }
		if(isset($_POST['updateM'])){
				$menu = $_POST['menu'];
				$link = $_POST['link'];
				$newConnect->update('menu', "name='$menu', link='$link'", $_SESSION['idMenu']);
				unset($_SESSION['idMenu']);
				mysqli_close($newConnect);
				header("Location:admin.php");
			}
 /* ===================Update News=====================*/
	if(isset($_POST['updateNews']) && $_SESSION['admin']){
?>
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
		<?php 
				$_SESSION['idNews']=$_POST['id'];
				$query=$newConnect->select('news','*', $_POST['id']);
				$row = mysqli_fetch_assoc($query);
			?>
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label>Author</label>
					<textarea class="form-control" name="auther" rows='3'><?php echo $row['created_by'];?></textarea>
				</div>
				<div class="form-group">
					<label class="block">İmage</label>
					<div class="pull-left"  style="width:150px; margin-right:30px;"><img class="img-responsive" src="../images/<?php echo $row['image'];?>">
					</div>
					<input type="file" name="image">
				</div>
				<div class="form-group" class="clearFix">
					<label>Text</label>
					<textarea class="form-control ckeditor" name="maintext"  rows='10'><?php echo $row['maintext'];?></textarea> 
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="updateN">Update</button>
				<button type="submit" class="btn btn-default pull-left" name="back">Back</button>
			</form>
		</div>
	</div>
	<?php }
		if(isset($_POST['updateN'])){
				$auther = $_POST['auther'];
				$text = $_POST['maintext'];
			    $picture = $_FILES["image"];
			    $query = $newConnect->select('news','image', $_SESSION['idNews']);
				$row = mysqli_fetch_assoc($query);
			if($picture['size'] == 0){
				$pic_file = $row['image'];
			}else{
				unlink("../images/".$row['image']);
				$pic_file = date('dmYGis').basename($picture["name"]);
			    $pic_dir = "../images/".$pic_file;
			    move_uploaded_file($picture["tmp_name"], $pic_dir);
			    chmod($pic_dir, 0755); 

			}
			$newConnect->update('news', "maintext='$text', image='$pic_file',created_date=created_date, created_by='$auther'", $_SESSION['idNews']);
			unset($_SESSION['idNews']);
			header("Location:admin.php");
		}

 /* ===================back=====================*/
		if(isset($_POST['back'])){
				unset($_SESSION['id']);
				mysqli_close($newConnect);
				header("Location:admin.php");
			}
		?>
</body>
</html>
