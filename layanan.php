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
		<?php require "navbar.php"; ?>
	</header>

	<section class="about">

		<div class="container benefit-wrapper">

			<div class="content-left-ben" data-aos="fade-right">
				<div class="headingb">Bagaimana Layanan Kamibox?</div>
				<p><img src="assets/images/garishijau.png"></p>
				<div class="list">
					<div class="check">
						<i class='bx bx-check-circle size' style="font-size: 3rem;margin-top:5px; "></i>
					</div>
					<div class="check">
						<p class="headisb">Layanan Jemput Sampah</p>
						<p>Kamibox menyediakan layanan jemput sampah untuk Area Jakarta dan Tangerang Raya. Layanan ini bisa digunakan oleh perkantoran, pertokoan dan rumah tangga.</p><br/>
					</div>
				</div>
				<div class="list">
					<div class="check">
						<i class='bx bx-check-circle size' style="font-size: 3rem;margin-top:5px; "></i>
					</div>
					<div class="check">
						<p class="headisb">Pemusnahan Arsip</p>
						<p>Pemusnahan arsip diperuntukkan untuk menjaga kerahasiaan data perusahaan. Kami menjamin proses pemusnahan akan dilakukan secara bertanggung jawab.</p><br/>
					</div>
				</div>
				<div class="list">
					<div class="check">
						<i class='bx bx-check-circle size' style="font-size: 3rem;margin-top:5px; "></i>
					</div>
					<div class="check">
						<p class="headisb">Kemitraan Bank Sampah</p>
						<p>Kami memiliki layanan kemitraan dengan Bank Sampah untuk bisa melakukan penjualan sampah ke Kamibox. Terdapat banyak keuntungan apabila bemitra dengan kami, yaitu mendapatkan insentif dan fasilitas branding dari Kamibox.</p><br/>
					</div>
				</div>
				<div class="list">
					<div class="check">
						<i class='bx bx-check-circle size' style="font-size: 3rem;margin-top:5px; "></i>
					</div>
					<div class="check">
						<p class="headisb">Extended Producer Responsibility (EPR)</p>
						<p>Untuk produsen yang ingin bertanggung jawab terhadap sampah kemasannya. Kami memiliki jaringan mitra pengumpul yang besar untuk membantu mengumpulkan sampah kemasan agar terdaur ulang dengan baik.</p><br/>
					</div>
				</div>

			</div>

			<div class="content-right-ben" data-aos="fade-left">
				<div class="img-benefit-wrapper">
					<img src="assets/images/design-4.png">
				</div>
			</div>

		</div>

	</section>
	<section>
		
		

		
		

		
		

		



	</section>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>

</body>

</html>