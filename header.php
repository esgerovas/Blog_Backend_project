<div class="header_top">
	<div class="wrap">
		<div class="logo">
		     <a href="index.php"><img src="images/logo.png" alt="" /></a>
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
		    <form action="" method="POST">
		    <input type="text" value="Axtarış" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Axtarış';}"><input type="submit" name="submit" value="">
		    </form>
		</div>
		<div class="clear"></div>
	</div>
</div>