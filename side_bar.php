<div class="sidebar">
	<div class="side_top">
		<h2>Yeni Xəbərlər</h2>
		<div class="list1">
		   <ul>
		   <?php
		   	$recent_query = $newConnect -> select('news','*', NULL, NULL, 'created_date DESC',5);
		   	while($recent_row = mysqli_fetch_assoc($recent_query)){
		   		$header = Operation::header($recent_row['maintext']);
		   		$header = strip_tags($header);
		   	?>
		   	<li><a href="single.php?id=<?php echo $recent_row['id'];?>"><?php echo $header;?></a></li>

		   	<?php } ?>	
		   </ul>
		</div>
	</div>

	<div class="side_bottom">
		<h2>Ən çox baxılanlar</h2>
		<div class="list2">
		   <ul>
			 <?php
		   	$most_query = $newConnect -> select('news','*', NULL, NULL, 'clicked_count DESC',5);
		   	while($most_row = mysqli_fetch_assoc($most_query)){
		   		$header = Operation::header($most_row['maintext']);
		   		$header = strip_tags($header);
		   	?>
		   	<li><a href="single.php?id=<?php echo $most_row['id'];?>"><?php echo $header;?></a></li>

		   	<?php } ?>
		   </ul>
		</div>
	</div>
</div><!-- sidebar -->