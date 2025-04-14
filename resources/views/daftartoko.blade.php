<!DOCTYPE html>
<html lang="en">
<head>
	<style>

	.single-product-item {
		border: 1px solid #ddd;
		padding: 15px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		margin-bottom: 20px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		height: 100%;
	}

	.single-product-item .product-image img {
		width: 100%;
		height: 200px; /* Ukuran tetap untuk gambar */
		object-fit: cover; /* Potong gambar agar pas */
		border-radius: 8px;
	}

	.single-product-item h3 {
		margin-top: 10px;
		font-size: 18px;
		color: #333;
	}

	.single-product-item .product-price {
		margin: 10px 0;
		color: #555;
	}

	.single-product-item .cart-btn {
		background-color: #007bff;
		color: #fff;
		text-decoration: none;
		padding: 10px;
		border-radius: 5px;
		display: inline-block;
	}

	.single-product-item .cart-btn:hover {
		background-color: #0056b3;
	}

	/* Konten utama agar fleksibel */
	.footer-area {
		flex: 1; /* Mengisi ruang yang tersisa */
		background-color: #f8f9fa; /* Warna latar abu-abu terang */
		padding: 20px 0;
	}

	.footer-box {
		margin-bottom: 20px;
	}

	.footer-box h2 {
		font-size: 18px;
		color: #333;
		margin-bottom: 10px;
	}

	.footer-box ul {
		list-style: none;
		padding: 0;
		color: #6c757d;
	}

	/* Gaya Copyright */
	.copyright {
		background-color: #343a40; /* Warna latar gelap */
		color: #ffffff; /* Warna teks putih */
		padding: 10px 0;
		text-align: center;
		font-size: 14px;
	}

	.copyright p {
		margin: 0;
	}

	.copyright .brand {
		color: #ff5733; /* Warna oranye untuk nama brand */
		font-weight: bold;
	}

	.copyright .author {
		color: #ff5733; /* Warna oranye untuk nama brand */
		font-weight: bold;
	}

	html {
		scroll-behavior: smooth;
		}

		.card-img-top {
    width: 300%; /* Menyesuaikan lebar dengan card */
    height: 350px; /* Atur tinggi gambar */
    object-fit: cover; /* Potong gambar agar pas tanpa merusak rasio */
}

	</style>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Utama Canteen</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/icon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logos.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
									<nav class="main-menu">
										<ul>              
											<li><a href="/#">Home</a></li>											
											<li><a href="/register">Register</a></li>
											<li><a href="/login">Login</a></li>
											<li><a href="/">Daftar</a>
												<ul class="sub-menu">
													<li><a href="/daftartoko">Toko</a></li>
													<li><a href="/#etalase-menu">Menu</a></li> <!-- Perbaikan link -->
												</ul>
											</li>
											<li><a href="#tentang-kami">Contact</a></li> <!-- Perbaikan link -->
											<li>
											</li>
										</ul>
									</nav>

									{{-- <div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div> --}}
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->


    {{-- <div class="container">
        <h2>Daftar Toko</h2>
    
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}



	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							{{-- <p class="subtitle">Daftar Toko</p> --}}
                            <h1>Daftar Toko di Kantin Utama</h1>
							<div class="hero-btns">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- toko section -->
{{-- <div class="product-section mt-150 mb-150">
    <div class="container">
        <h2 class="text-center mb-5">Daftar Toko</h2>
        <div class="row g-4"> <!-- Menambahkan 'g-4' untuk memberikan jarak antar kolom -->
            @foreach (['Toko A', 'Toko B', 'Toko C', 'Toko D', 'Toko E'] as $toko)
                <div class="col-lg-4 col-md-6"> <!-- Menyesuaikan grid agar responsif -->
                    <div class="card h-100 shadow-sm"> <!-- Menambahkan 'h-100' untuk konsistensi tinggi -->
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Toko Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $toko }}</h5>
                            <p class="card-text">Deskripsi singkat tentang {{ $toko }}. Toko ini menawarkan berbagai produk berkualitas dengan harga yang kompetitif.</p>
                            <a href="#" class="btn btn-primary w-100">Lihat Detail</a> <!-- Tombol full-width -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
<div class="product-section mt-150 mb-150">
    <div class="container">
        <h2 class="text-center mb-5">Daftar Toko</h2>
        <div class="row g-4"> <!-- Memberikan jarak antar kolom -->
            @foreach ($tokos as $toko) <!-- Ambil data toko dari database -->
                <div class="col-lg-4 col-md-6"> <!-- Responsif -->
                    <div class="card h-100 shadow-sm"> <!-- Konsistensi tinggi -->
                        <img src="{{ asset('storage/' . $toko->gambar_toko) }}" class="card-img-top" alt="{{ $toko->nama_toko }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $toko->nama_toko }}</h5>
                            <p class="card-text">{{ $toko->deskripsi }}</p> <!-- Ambil deskripsi dari database -->
                            {{-- <a href="{{ route('toko.detail', $toko->id) }}" class="btn btn-primary w-100">Lihat Detail</a> <!-- Link ke detail toko --> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- end toko section -->

	

	<!-- Footer -->
<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6" id="tentang-kami">
				<div class="footer-box about-widget">
					<h2 class="widget-title">Tentang Kami</h2>
					<p>Utama Canteen adalah Website Penjualan SMKI Utama yang dibuat agar guru ataupun siswa dapat melihat dan 
						memesan menu makanan dan minuman yang ada di kantin sekolah dengan mudah.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title">Alamat</h2>
					<ul>
						<li>JL. JCC KOMPLEKS PT.PLN P3B JAWA BALI NO.61 KRUKUT, 
							Krukut, Kec. Limo, Kota Depok Prov. Jawa Barat</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title">Kontak</h2>
					<ul>
						<li>smki-utama@smki-gratis.sch.id</li>
						<li>www.smki-gratis.sch.id</li>
						<li>0217530843</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Footer -->

<!-- Copyright -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>&copy; 2025 - <span class="brand">Utama Canteen</span>
					Created by - <span class="author">Aprelia Tri Kartini</span>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- End Copyright -->

	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>
   
    







