<!DOCTYPE HTML>
<html>
<head>
<title>The Free Blogsite.com Website Template | About :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<style>
	.box1 h1{
		font-size:28px;
	}
</style>
</head>
<body>
<div class="header">
	<?php include('header.php'); ?>
</div><!-- header -->

<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="box1">
				<?php 
					include('class.php');
					if(isset($_GET['id'])){
						$id = $_GET['id'];
						$clicked_count = $newConnect ->select('news','clicked_count',$id);
						$clicked_row = mysqli_fetch_assoc($clicked_count);
						$clicked = (int)$clicked_row['clicked_count']+1;
						$newConnect ->update('news',"clicked_count=$clicked", $id);

					}else {
						$query2 = $newConnect ->select('news','id',null,null,'created_date DESC');
						$row2 = mysqli_fetch_assoc($query2);
						$id = $row2['id'];
					}
					$k=0;
					if(isset($_POST['submit'])){
						$search = $_POST['search'];
						$query3 = $newConnect -> select('news','*', NULL, $search, 'clicked_count DESC');
						 if(mysqli_num_rows($query3)==0){
							$header1 = "<h2 style='margin:30px 10px; font-size:28px; color:gray;'>Axtarış Tapılmadı</h2>";
							$k=1;
						}
					}else{
					$query3 = $newConnect->select('news', '*', $id);
					}
					if($k==0){
					$row3 = mysqli_fetch_assoc($query3);
					$header = Operation::header($row3['maintext']);
					$subheader =  Operation::subheader($row3['maintext']);
					$content = Operation::maintext($row3['maintext']);
					$content = str_replace($subheader," ",$content);
					$auther = $row3['created_by'];
					$time = Operation::pass_date($row3['created_date']);
					
				?>

			   <?php echo $header; ?>
			    <span><?php echo $auther;?> tərəfindən - <?php echo $time; ?> əvvəl</span>
			   <?php echo $subheader;?>
				<div class="top_img">
				   <img  src="images/<?= $row3['image'];?>">
				</div>   
				<?php echo $content;}else{ echo $header1; } ?>
			</div> 
		</div> 

	<?php include('side_bar.php'); ?>
	<div class="clear"></div>
</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>

