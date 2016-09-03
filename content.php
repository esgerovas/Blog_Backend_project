
<?php 
	$per_page =3;
	$query1 = $newConnect->select('news');
	$rowno = mysqli_num_rows($query1);
	$page_count = ceil($rowno/$per_page);
	$paginationCtrls = '';
	$page = 1;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		if($_GET['page']<1){
		$page = 1;
	} 
		if($_GET['page']>$page_count){
			$page  = $page_count;
		} 
	}
	if($page_count!= 1){
		if ($page > 1) {
		    $previous = $page - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'">Previous</a> &nbsp; &nbsp; ';

			for($i = $page-4; $i < $page; $i++){
				if($i > 0){
			        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
				}
		    }
		}

		$paginationCtrls .= ''.$page.' &nbsp; ';

		for($i = $page+1; $i <= $page_count; $i++){
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp; ';
			if($i >= $page+4){
				break;
			}
		}

		if ($page != $page_count) {
		    $next = $page + 1;
		    $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a> ';
		}
	}
   
	$limit = ($page > 1)? ($page * $per_page)- $per_page : 0;
	include('class.php');
	$k=0;
	if(isset($_POST['submit'])){
		$search = $_POST['search'];
		$query_limit = $newConnect -> select('news','*', NULL, $search, 'created_date DESC',$per_page,$limit);
		 if(mysqli_num_rows($query_limit)==0){
			$header1 = "<h2 style='margin:30px 10px; font-size:28px; color:gray;'>Axtarış Tapılmadı</h2>";
			$k=1;
		}

	}else{
	$query_limit = $newConnect -> select('news','*', NULL, NULL, 'created_date DESC',$per_page,$limit);
	}
	while ($row1 = mysqli_fetch_assoc($query_limit)) {
		$header = Operation::header($row1['maintext']);
		$content = Operation::maintext($row1['maintext']);
		$pos = strpos($content,' ', 500);
		$content = substr($content,0,$pos)."<a href=single.php?id=$row1[id]> ...>>></a></p>";;
		$auther = $row1['created_by'];
		$time = Operation::pass_date($row1['created_date']);

	?>
	<div class="box1">
	    <a href="single.php?id=<?php echo $row1['id'];?>"><?php echo $header; ?></a>
	    <span><?php echo $auther;?> tərəfindən - <?php echo $time; ?> əvvəl</span>
		<div style="width:280px;"class="box1_img">
		    <img  src="images/<?= $row1['image'];?>" alt="" />
		</div>   
		<div class="data">
		  <?php echo $content; ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php } ?>	
		  <?php if($k==1){echo $header1;}?>
	<div class="page_links">
		<div class="page_numbers">
		<?php echo $paginationCtrls; ?>
		</div>
		<div class="clear"></div>
		<div class="page_bottom">
			<p>Back To : <a href="index.php?page=<?php echo $page;?>">Top</a> |  <a href="index.php?page=1">Home</a></p>
		</div>
	</div><!-- page_link-->
