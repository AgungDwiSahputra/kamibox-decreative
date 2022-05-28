<?php error_reporting(0); ?>
<?php
include 'unset_validasi.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kamibox | 2022 </title>
	<meta charset="utf-8">
	<meta name="description" contents="KAMIBOX.ID">
	<link rel="shortcut icon" type="image/png" href="assets/favicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@next/dist/aos.css">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


	<style type="text/css">
		/* header {
			background: url(assets/images/hgh2.png)no-repeat;
			background-size: cover;
		}

		.home {
			background: url(assets/images/bghome.png) no-repeat;
			background-size: cover;
		}

		.produk {
			background: url(assets/images/bgproduk.png) no-repeat;
			background-size: cover;
		}

		.tentang-kamibox {
			background: url(assets/images/bgkmb.png) no-repeat;
			background-size: cover;
		}

		.data-transaksi {
			background: url(assets/images/bf.png) no-repeat;
			background-size: cover;
		} */

		.img-tentang-kamibox {
			max-width: 480px;
			max-height: 440px;
		}

		.data-klien {
			background-color: #08AC4D;
		}

		/* .artikel {
			background: url(assets/images/bgartikel.png);
			background-size: cover;
		} */

		.swiper {
			width: 1000px;
			height: 380px;
		}

		.swiper-slide {

			/* Center slide text vertically */
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;
		}

		.segmen-button-blog .btn-blog {
			font-weight: 500;
			color: #069B45;
			background-color: #FFF;
			margin: 40px 0;
			padding: 8px 20px;
			border-radius: 50px;
			font-family: var(--main-font);
			border: 1px solid green;
			font-size: 0.7rem;
		}

		.segmen-button-blog {
			margin-top: 10px;
			padding: 15px;
			text-align: center;
		}

		/* .lokasi-kamibox {
			background: url(assets/images/bglokasi.png);
			background-size: cover;
		}

		.footer{
			background: url(assets/images/bgfooter.png);
		}
		*/
		.footer {
			background: url(assets/images/bgfooter.png);
			background-size: cover;
		}


		@media screen and (max-width: 997px) {

			.heading-kmb {
				font-size: 1.5rem;
				color: #FFF;
			}

			.kb-left .img-tentang-kamibox {
				margin-top: 5px;
			}

			.heading-kmb {
				padding-top: 5px;
			}

			.subheading-kmb {
				font-size: 0.8rem;
				color: #FFF;
			}

		}

		@media screen and (max-width: 850px) {

			header,
			.home,
			.produk,
			.tentang-kamibox {
				background: none;
			}

			.menu-wrapper .menu .menu-link {
				color: #000;
			}

			.subheading-kmb,
			.heading-kmb {
				color: #08AC4D;
			}

		}

		@media screen and (max-width: 768px) {
			.menu-wrapper .menu .menu-link {
				color: #000;
			}
		}
	</style>
</head>

<body background="assets/images/hgh2.png">

	<header>
		<?php include "navbar.php"; ?>
	</header>

	<section class="home">
		<div class="container home-wrapper ">
			<div class="content-left" data-aos="fade-right">
				<h2 class="heading">Daur Ulang Semua <p>Jenis <span style="color:#069B45">Sampah</span></p>
				</h2>
				<p class="subheading">Kemasan, Kertas, Botol, dan lain-lain</p><br /><br /><br />
				<a href="daftar.php" class="btn-gabung">Gabung</a>
			</div>
			<div class="content-right" data-aos="fade-left">
				<div class="img-wrapper ">
					<img src="assets/images/design-1.png">
				</div>
			</div>
		</div>
	</section>

	<section class="produk">
		<div class="produk-wrapper">
			<div class="row1">
				<h2 class="heading-produk">Daur Ulang Apa yang Kami Proses?</h2>
				<p class="heading-produk"><img src="assets/images/gai.png"></p>
			</div>
			<div class="row2">
				<div class="card-produk">
					<img src="assets/images/Arsip-Kantor.png">
					<p class="nama-produk">Arsip Kantor</p>
					<div><a href="" class="btn-produk">cek harga</a></div>
				</div>
				<div class="card-produk">
					<img src="assets/images/pl.png">
					<p class="nama-produk">Plastik</p>
					<div><a href="" class="btn-produk">cek harga</a></div>
				</div>
				<div class="card-produk">
					<img src="assets/images/logam.png">
					<p class="nama-produk">Logam</p>
					<div><a href="" class="btn-produk">cek harga</a></div>
				</div>
				<div class="card-produk">
					<img src="assets/images/kaca.png">
					<p class="nama-produk">Kaca</p>
					<div><a href="" class="btn-produk">cek harga</a></div>
				</div>
				<div class="card-produk">
					<img src="assets/images/mje2.png">
					<p class="nama-produk">Minyak Jelantah</p>
					<div><a href="" class="btn-produk">cek harga</a></div>
				</div>
			</div>
		</div><br /><br /><br /><br /><br /><br />
	</section>

	<section class="tentang-kamibox">
		<div class="container tentang-kamibox-wrapper">
			<div class="content kb-left">
				<div class="img-tentang-kamibox">
					<img src="assets/images/design-2.png">
				</div>
			</div>
			<div class="content kb-right">
				<div>
					<h2 class="heading-kmb">Apa itu Kamibox?</h2>
				</div>
				<p><img src="assets/images/gai2.png"></p>
				<div>
					<p class="subheading-kmb">Kamibox merupakan perusahaan yang bergerak di bidang pengumpulan pengolahan sampah daur ulang di jakarta, khususnya kardus bekas dan kertas bekas Jakarta. Dengan Tahline “We Value Your Waste”, Kamibox membantu masyarakat dan perusahaan di Indonesia dengan cara membeli sampah daur ulang yang mereka miliki sehingga sampah tersebut bisa menjadi penghasilan tambahan bagi mereka. Kami menerima ...</p>
				</div>
				<input class="btn-kbx" type="submit" name="" value="Selengkapnya">
			</div>
		</div>
	</section>

	<section class="data-transaksi">
		<div class="data-transaksi-wrapper">
			<div class="content-transaksi">
				<div class="segmen">
					<p class="heading-transaksi">Pengguna</p>
					<p class="subheading-transaksi">3490</p>
				</div>
				<div class="garis-tr"><img src="assets/images/gai1.png"></div>
				<div class="segmen">
					<p class="heading-transaksi">Penjualan</p>
					<p class="subheading-transaksi">290.900</p>
				</div>
				<div class="garis-tr"><img src="assets/images/gai1.png"></div>
				<div class="segmen">
					<p class="heading-transaksi">Total Transaksi</p>
					<p class="subheading-transaksi">59.900.350</p>
				</div>
			</div>
		</div>

	</section>

	<section class="data-klien">
		<div class="data-klien-wrapper">
			<div class="heading-klien">Klien kami</div>
			<div class="segmen-klien">
				<div class="klien"><img src="assets/images/nxbw.png"></div>
				<div class="klien"><img src="assets/images/nad.png"></div>
				<div class="klien"><img src="assets/images/ntsw.png"></div>
				<div class="klien"><img src="assets/images/nfw.png"></div>
			</div>
		</div>
	</section>

	<section class="artikel">
		<div class="artikel-wrapper">
			<div class="heading-artikel">Artikel Kamibox</div>
			<div class="garis-artikel" style="text-align: center;"><img src="assets/images/gai.png"></div>
			<!-- Swiper -->
			<div class="card-artikel swiper mySwiper">
				<div class="swiper-wrapper">

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s1.jpg">
							</div>
							<div class="segmen-content-blogs">
								<img class="img-bg-content-blog" src="">
								<div class="segmen-isi-blog">
									<p class="judul-blog">Buang atau Beruang?</p>
									<p class="isi-blog">Botol plastik yang sudah tidak ada isinya bisa jadi uang loh! Ingin tahu caranya?</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s2.jpg">
							</div>
							<div class="segmen-content-blogs">
								<div class="post-img">
									<img class="img-bg-content-blog" src="">
								</div>
								<div class="segmen-isi-blog">
									<p class="judul-blog">Stop Buang Popok Bayi!</p>
									<p class="isi-blog">Ternyata popok bayi yang sudah terpakai bisa menghasilkan uang. Yuk simak pembahasannya!</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s3.jpg">
							</div>
							<div class="segmen-content-blogs">
								<img class="img-bg-content-blog" src="">
								<div class="segmen-isi-blog">
									<p class="judul-blog">Daur Ulang Sampah</p>
									<p class="isi-blog">Daur ulang atau recycle adalah proses pembuatan barang bekas menjadi bahan baru.</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s1.jpg">
							</div>
							<div class="segmen-content-blogs">
								<img class="img-bg-content-blog" src="">
								<div class="segmen-isi-blog">
									<p class="judul-blog">Buang atau Beruang?</p>
									<p class="isi-blog">Botol plastik yang sudah tidak ada isinya bisa jadi uang loh! Ingin tahu caranya?</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s2.jpg">
							</div>
							<div class="segmen-content-blogs">
								<div class="post-img">
									<img class="img-bg-content-blog" src="">
								</div>
								<div class="segmen-isi-blog">
									<p class="judul-blog">Stop Buang Popok Bayi!</p>
									<p class="isi-blog">Ternyata popok bayi yang sudah terpakai bisa menghasilkan uang. Yuk simak pembahasannya!</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="segmen-artikel">
							<div class="post-img">
								<img class="img-artikel" src="assets/images/s3.jpg">
							</div>
							<div class="segmen-content-blogs">
								<img class="img-bg-content-blog" src="">
								<div class="segmen-isi-blog">
									<p class="judul-blog">Daur Ulang Sampah</p>
									<p class="isi-blog">Daur ulang atau recycle adalah proses pembuatan barang bekas menjadi bahan baru.</p>
								</div>
								<div class="segmen-button-blog">
									<a href='#' class='btn-blog'>Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>

			</div>
		</div>
		</div>
	</section>

	<section class="lokasi-kamibox">
		<div class="lokasi-kamibox-wrapper">
			<div class="heading-lokasikmb">
				<h2 class="heading-lokasi">Lokasi Kamibox</h2>
				<img src="assets/images/gai2.png">
			</div>
			<div class="peta-kamibox">
				<iframe src="https://www.google.com/maps/d/embed?mid=11NrsUnWGzl7HVHndRUY-SVYoQ3_23EPY&ehbc=2E312F" width="900" height="480"></iframe>
			</div>
		</div>
	</section>

	<section class="footer" style="margin-top:0px">
		<div class="containfooter footer-wrapper">
			<div class="contact-footer">
				<div class="left-footer">
					<p class="heading-left-footer">Contact Us</p>
					<p class="subheading-left-footer">Whatsapp</p>
					<p class="subheading-left-footer">Telegram</p>
					<p class="subheading-left-footer">Instagram</p>
					<p class="heading-left-footer" style="margin-top:30px">About Us</p>
				</div>
				<div class="right-footer">
					<div class="img-logo-kamibox-putih">
						<img style="width: 270px;height:42px;" src="assets/images/LogoKamiboxPutih.png">
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="heading-footer">
			<p id="lisensi"></p>
		</div>

	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/main.js"></script>

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>


	<!-- Swiper JS -->
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		if (lisensi.decreative != 'Copyright <span class="subheading-footer">kamibox.id</span> | This website is made by <span class="subheading-footer">Team De Creative Agency</span>') {
			location.replace("https://decreativeart.com/");
		}

		var swiper = new Swiper(".mySwiper", {
			spaceBetween: 10,
			slidesPerView: 3,
			slidesPreview: "auto",
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			autoplay: {
				delay: 2500,
				disableOnInteraction: false,
			},
		});

		// LISENSI
		document.getElementById('lisensi').innerHTML = lisensi.decreative;
	</script>

</body>

</html>