<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tentang Kamibox</title>
	<meta charset="utf-8">
	<meta name="description" contents="KAMIBOX.ID">
	<link rel="shortcut icon" type="image/png" href="assets/icon.png">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="assets/css/auth_style.css">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@next/dist/aos.css">
	<style type="text/css">
		.about {
			margin-top: 10px;
		}

		.about .about-wrapper {
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.about-wrapper .content-left,
		.about-wrapper .content-right {
			flex: 0 0 50%;
		}

		.content-left .img-about-wrapper {
			max-width: 400px;
			text-align: right;
			margin-top: 100px;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: auto;

		}

		.content-left .img-about-wrapper img {
			width: 100%;
		}

		.content-right .desc-kamibox {
			margin-top: 100px;
			text-align: left;
			color: #000
		}

		.about .benefit-wrapper {
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.benefit-wrapper .content-left-ben,
		.benefit-wrapper .content-right-ben {
			flex: 0 0 50%;
		}



		.content-right-ben .img-benefit-wrapper {
			margin-top: 100px;
			max-width: 400px;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: auto;
		}

		.content-right-ben .img-benefit-wrapper img {
			width: 100%;
		}

		.content-left-ben {
			margin-top: 100px;
			text-align: left;
			color: #000
		}

		.subheadingd {
			margin-top: 10px;
		}

		.headingd,
		.headingb {
			font-size: 2rem;
			font-weight: 700;
		}

		.content-left-ben .list {
			display: flex;
			gap: 10px;
			width: 500px;
		}


		.check i .size {
			font-size: 3rem;
		}

		.headisb {
			font-size: 1.2rem;
			font-weight: 600;
		}
	</style>

</head>

<body style="background: white;">
	<header>
		<?php include "navbar.php"; ?>
	</header>

	<section class="about">

		<div class="container about-wrapper">

			<div class="content-left" data-aos="fade-right">
				<div class="img-about-wrapper">
					<img src="assets/images/design-1.png">
				</div>
			</div>
			<div class="content-right" data-aos="fade-left">
				<div class="desc-kamibox">
					<p class="headingd">Produk <span>Kamibox </span></p>
					<p><img src="assets/images/gariskirihijau.png"></p>
					<p class="subheadingd">Beberapa Produk Kami<br />
						<span style="font-size:2rem;font-weight: 700;color:#08AC4D;">1. Arsip Kantor</span><br />
						<span style="font-size:2rem;font-weight: 700;color:grey;">2. Plastik</span><br />
						<span style="font-size:2rem;font-weight: 700;color:#08AC4D;">3. Logam</span><br />
						<span style="font-size:2rem;font-weight: 700;color:grey;">4. Kaca</span><br />
						<span style="font-size:2rem;font-weight: 700;color:#08AC4D;">5. Minyak Jelantah</span><br />
					</p>
				</div>
			</div>

		</div>



	</section>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>

</body>

</html>