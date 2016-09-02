<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Blogsite.com Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="wrap">
			<div class="logo">
			     <a href="index.html"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="login_button">
			    <ul>
			    <li><a href="#">Sign in</a><li> | 
			    <li><a href="login.php">Login</a></li>
			    </ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header_bottom">
		<div class="wrap">
			<div class="menu">
			    <ul>
			   		<?php 
			    	include("admin/db.php");
			    	$query = $newConnect->select('menu');
			    	while ($row = mysqli_fetch_assoc($query)) { ?>
			    		<li><a style="text-transform:uppercase;" href="<?= $row['link']; ?>"><?=$row['name']; ?></a></li>
			    	<?php } ?>
			    </ul>
			</div>
			<div class="search_box">
			    <form>
			    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
			    </form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="wrap">
	<div class="main">
		<div class="content">
		<?php 
			$count=0;
	    	$query1 = $newConnect->select('news');
	    	$rowno=mysqli_num_rows($query1);
	    	while ($row1= mysqli_fetch_assoc($query1)) {
	    		
	    		if($count%3==0){
	    			if($count==0){
	    				$class='box_block active';
	    			}else{
	    				$class='box_block';
	    			}
	    			echo '<div id="block'.$count.'" class="'.$class.'">';
	    		}
	    		$str = $row1['maintext'];
	    		$hstr = substr($str,0,4);
	    		if($hstr=='<h1>' || $hstr=='<h2>'|| $hstr=='<h3>' || $hstr=='<h4>'|| $hstr=='<h5>' || $hstr=='<h6>'){
	    			$hstr=substr($str, 0,strpos($str, "</h")+5);
	    			$pstr=substr($str,strpos($str, "</h")+6, 500).'<a href="single.php"> ardi...>>></a></p>';
	    		}else{
	    			$hstr='<h1>'.substr($str, 3,strpos($str, ".")-3).'</h1>';
	    			$pstr='<p>'.substr($str,strpos($str, ".")+1, 500).'<a href="single.php"> ardi...>>></a></p>';
	    		}

	    		$auther = $row1['created_by'];
	    		$ref_date = $row1['created_date'];
	    		$now_date = date("Y-m-d H:i:s");

				$ref_date = new DateTime($ref_date);
				$now_date = new DateTime($now_date);
				$diff = $now_date->diff($ref_date);
				// printf('%d year, %d month, %d days, %d hours, %d minutes, %d seconds', $diff->y, $diff->m, $diff->d, $diff->h, $diff->i, $diff->s);
				if($diff->y !=0){
					$time = $diff->y." il";
				}else if($diff->m !=0){
					$time = $diff->m." ay";
				}else if($diff->d !=0){
					$time = $diff->d." gün";
				}else if($diff->h !=0){
					$time = $diff->h." saat";
				}else if($diff->i !=0){
					$time = $diff->i." dəqiqə";
				}else{
					$time = $diff->s." saniyə";
				}
			?>
	    	<div class="box1">
			    <a href="http://ads.ad-center-com/offer?prod=101&ref=5030200&q=Sara"><?php echo $hstr; ?></a>
			    <span><?php echo $auther;?> tərəfindən - <?php echo $time; ?> əvvəl</span>
				<div style="width:280px;"class="box1_img">
				    <img  src="images/<?= $row1['image'];?>" alt="" />
				</div>   
				<div class="data">
				  <?php echo $pstr; ?>
				</div>
				<div class="clear"></div>
			</div>
	    		
	    	<?php if($count%3==0){
	    			echo '</div>';
	    		}$count++; } ?>

		 <div class="page_links">
			<div class="next_button">
				 <a href="#">Next</a>
			</div>
			<div class="page_numbers">
			    <ul>
			    <?php
			    	$count=0; 
			    	for($i=0; $i<$rowno; $i++){
			    		if($i%3==0 && $count<6){ ?>
			    			<li><a href='#block<?php echo $count; ?>'><?php echo ++$count; ?></a></li>
			    	<?php }


			    	}?>
				<!-- <li><a href="#">1</a>
				<li><a href="#">2</a>
				<li><a href="#">3</a>
				<li><a href="#">4</a>
				<li><a href="#">5</a>
				<li><a href="#">6</a>
				<li><a href="#">... Next</a> -->
				</ul>
			</div>
		<div class="clear"></div>
			<div class="page_bottom">
				<p>Back To : <a href="#">Top</a> |  <a href="#">Home</a></p>
			</div>
		</div>
		</div>
	<div class="sidebar">
		<div class="side_top">
		    <h2>Recent Feeds</h2>
			<div class="list1">
				 <ul>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
					<li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
				</ul>
			</div>
		</div>
	<div class="side_bottom">
	    <h2>Most Viewed</h2>
		<div class="list2">
		    <ul>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			  <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			</ul>
		</div>
	</div>
	</div>
	<div class="clear"></div>
	</div>
</div>
<div class="footer">
	<div class="wrap">
		<div class="footer_grid1">
			<h3>About Us</h3>
			<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here desktop publishing making it look like readable English.<br><a href="#">Read more....</a></p>
		</div>
		<div class="footer_grid2">
			<h3>Navigate</h3>
				<div class="f_menu">
					<ul>
				       <li><a href="index.html">Home</a></li>
				       <li><a href="single.html">Articles</a></li>
				       <li><a href="contact.html">Contact</a></li>
				       <li><a href="#">Write for Us</a></li>
				       <li><a href="#">Submit Tips</a></li>
				       <li><a href="#">Privacy Policy</a></li>
				   </ul>
				</div>
		</div>
	<div class="footer_grid3">
		<h3>We're Social</h3>
		<div class="img_list">
		    <ul>
		     <li><img src="images/facebook.png" alt="" /><a href="#">Facebook</a></li>
		     <li><img src="images/flickr.png" alt="" /><a href="#">Flickr</a></li>
		     <li><img src="images/google.png" alt="" /><a href="#">Google</a></li>
		     <li><img src="images/yahoo.png" alt="" /><a href="#">Yahoo</a></li>
		     <li><img src="images/youtube.png" alt="" /><a href="#">Youtube</a></li>
		     <li><img src="images/twitter.png" alt="" /><a href="#">Twitter</a></li>
		     <li><img src="images/yelp.png" alt="" /><a href="#">Help</a></li>
		    </ul>
		</div>
	</div>
	</div>
<div class="clear"></div>
</div>
	<div class="f_bottom">
		<p>© 2012 rights Reseverd | Design by<a href="http://w3layouts.com/"> W3Layouts</a></p>
	</div> 
</body>
</html>


