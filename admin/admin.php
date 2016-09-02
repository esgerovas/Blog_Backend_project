<?php 
session_start();
	if(isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<style type="text/css">
		.container{
			margin-top:20px;
		}
		li a{
			color:#222222;
			font-size:22px;
		}
		li.active a{
			color:#8B0530 !important;
		}
		.head{
			margin-bottom:30px;
			margin-top:15px;
			text-align:center;
			font-size:35px;
			color:#8B0530;
		}
		button{
			float:left;
			margin-left:20px;
			color:white;
		}
		.pull_left{
			clear:both;
			float:right;
			background-color:#222222;
			font-size:16px !important;
			margin:20px 0;
		}
		

		#news button{
		margin:10px 0;
	}
	.create{
			margin:15px 0;
			margin-left:0;
			background-color:#8B0530;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
		<h1 class="head"> Welcome Admin Panel</h1>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menu</a></li>
		    <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
		  </ul>

		  <!-- Tab panes -->
			<div class="tab-content">
				<!-- ========== MENU ================ -->	
			    <div role="tabpanel" class="tab-pane active" id="menu">
			    	<h2>Menu</h2>
			    	<form action="insert.php" method="POST">	
					 	<button class="btn pull-left create" name="addMenu">Create</button>
					</form>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Menu Name</th>
								<th>Link</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							include "db.php";
							 $query = $newConnect->select('menu');
							 while($row = mysqli_fetch_assoc($query)){ ?>
							 	 	<tr>
							 	 		<td><?php echo $row['id']; ?></td>
							 	 		<td><?php echo $row['name']; ?></td>
							 	 		<td><?php echo $row['link']; ?></td>
							 	 		<td class="text-center"> 
							 	 			<form action="update.php" method="POST">
							 	 				<button class="btn btn-success" name="updateMenu"><i class="glyphicon glyphicon-edit"></i></button>
							 	 				<input class="hidden" name='id' value="<?=$row['id'];?>">
							 	 			</form>
							 	 			<form action="delete.php" method="POST">	
							 	 				<button class="btn btn-danger" name="deleteMenu"><i class="glyphicon glyphicon-trash"></i></button>
							 	 				<input class="hidden" name='id' value="<?=$row['id'];?>">
							 	 			</form>
							 	 			
							 	 		</td>
							 	 	</tr>
							 <?php } ?>
						</tbody>
					</table>
				</div>
				<!-- ========== NEWS ================ -->
		   		<div role="tabpanel" class="tab-pane" id="news">
			    	<h2>News</h2>
			    	<form action="insert.php" method="POST">	
					 	<button class="btn pull-left create" name="addNews">Create</button>
					</form>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>MainText</th>
								<th>image</th>
								<th>created_date</th>
								<th>created_by</th>
								<th>clicked_count</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							 $query = $newConnect->select('news');
							 while($row= mysqli_fetch_assoc($query)){ ?>
							 	 	<tr>
							 	 		<td><?php echo $row['id']; ?></td>
							 	 		<td><?php echo $row['maintext']; ?></td>
							 	 		<td><?php echo '<img class="img-responsive" src="../images/'.$row['image'].'">'; ?></td>
							 	 		<td><?php echo $row['created_date']; ?></td>
							 	 		<td><?php echo $row['created_by']; ?></td>
							 	 		<td><?php echo $row['clicked_count']; ?></td>
							 	 		<td class="text-center"> 
							 	 			<form action="update.php" method="POST">
							 	 				<button class="btn btn-success" name="updateNews"><i class="glyphicon glyphicon-edit"></i></button>
							 	 				<input class="hidden" name='id' value="<?=$row['id'];?>">
							 	 			</form>
							 	 			<form action="delete.php" method="POST">	
							 	 				<button class="btn btn-danger" name="deleteNews"><i class="glyphicon glyphicon-trash"></i></button>
							 	 				<input class="hidden" name='id' value="<?=$row['id'];?>">
							 	 			</form>
							 	 		</td>
							 	 	</tr>
							 <?php } ?>
						</tbody>
					</table>
				</div>
  			</div><!-- tab-content -->
  			<form action="logout.php" method="POST">	
				<button class="btn pull_left" name="logout">Log Out</button>
			</form>
  		</div>
 	</div>
</body>
</html>
<script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<?php 
	}else{
		unset($_SESSION['admin']);
		header("Location:../index.php");
	}
	
?>