
<nav class="navbar" >
	<div class="container nav-wrapper">
		<a href="index.php" class="logo"><img src="assets/images/LogoKamibox.png"></a>
			<div class="menu-wrapper">
				<ul class="menu">
					<li class="menu-item"><a href="produk.php" class="menu-link">Produk</a></li>
					<li class="menu-item"><a href="layanan.php" class="menu-link">Layanan</a></li>
					<li class="menu-item"><a href="tentang.php" class="menu-link">Tentang</a></li>
					<li class="menu-item"><a href="blog.php" class="menu-link">Blog</a></li>
					<li class="menu-item"><a href="portofolio.php" class="menu-link">Portofolio</a></li>
				</ul>
				 <?php error_reporting(0); ?>
				<?php 
				session_start();
					
					if($_SESSION['login']==true && $_SESSION['level_user']=='1' ){
						echo "<a href='admin/update_harga.php' class='btn-login-true'> Hai, ".$_SESSION['nama_user']."</a>";
					}elseif($_SESSION['login']==true && $_SESSION['level_user']=='2' ){
						echo "<a href='mitra/index.php' class='btn-login-true'> Hai, ".$_SESSION['nama_user']."</a>";
					}elseif($_SESSION['login']==true && $_SESSION['level_user']=='3' ){
						echo "<a href='pemasok/index.php' class='btn-login-true'> Hai, ".$_SESSION['nama_user']."</a>";
					}else{
						echo "<a href='login.php' class='btn-login'>Login</a>";
					}		
				 ?>


			</div>
			<div class="menu-toggle bx bxs-grid-alt"></div>
	</div>
</nav>

