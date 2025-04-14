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
							<ul>	
								<ul> 
									@if (Route::has('login'))
										@auth
											<li>
												@if(Auth::user()->role_as == 'pelanggan')
													<a href="{{ url('/dashboard') }}" 
													   class="btn btn-primary d-flex align-items-center justify-content-center" 
													   style="padding: 5px 10px; background-color: #529ada; color: white;">
													   Home
													</a>
												@else
													<a href="{{ url('/admin/dashboard') }}" 
													   class="btn btn-primary d-flex align-items-center justify-content-center" 
													   style="padding: 5px 10px; background-color: #4698df;">
													   Home
													</a>
												@endif
											</li>
										@else
											<li>
												<a href="{{ route('login') }}" 
												   class="btn btn-light d-flex align-items-center justify-content-center" 
												   style="background-color: #4154f1; color: white; border: 1px solid #ccc; padding: 5px 10px;">
												   Get Started
												</a>
											</li>
										@endauth
									@endif
								</ul>
								<li><a href="/register">Register</a>
								<li><a href="/login">Login</a></li>
								<li><a href="/">Daftar</a>
									<ul class="sub-menu">
										<li><a href="/daftartoko">Toko</a></li>
										<li><a href="#etalase-menu">Menu</a></li>
									</ul>
								</li>
								<li><a href="#tentang-kami">Contact</a></li>
								<li>
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

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Utama Canteen</p>
							<h1>Heavy Meal, Snacks & Drinks</h1>
							<div class="hero-btns">
								<a href="#etalase-menu" class="boxed-btn">Menu Collection</a>

								{{-- <a href="/daftarproduk" class="boxed-btn">Menu Collection</a> --}}
								{{-- <a href="/contactus" class="bordered-btn">Contact Us</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- product section -->

			<div class="product-section mt-150 mb-150" id="etalase-menu">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="section-title">
								<h3><span class="orange-text">Etalase</span> Menu</h3>
                    			<p>Berbagai macam pilihan makanan dan minuman, dari dari makanan berat hingga makanan ringan untuk melengkapi harimu.</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						@foreach($produks as $produk)
							<div class="col-lg-4 col-md-6 text-center">
								<div class="single-product-item">
									<div class="product-image">
										<a href="single-product.html">
											<img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}">
										</a>
									</div>
									<h3>{{ $produk->nama_produk }}</h3>
									<p class="product-price">
										<span>Rp. {{ number_format($produk->harga, 2, ',', '.') }}</span>
									</p>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			

			{{-- <div class="row"> 
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/mi goreng.jpg" alt="Mie Goreng"></a>
						</div>
						<h3>Mie Goreng</h3>
						<p class="product-price"><span>Rp. 5.000,00</span><span>Rp. 8.000,00 + Telur</span></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/mochi.jpg" alt="Mochi"></a>
						</div>
						<h3>Mochi</h3>
						<p class="product-price"><span>Rp. 3.000,00</span></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/Es Teh.jpg" alt="Es Teh Manis"></a>
						</div>
						<h3>Es Teh Manis</h3>
						<p class="product-price"><span>Rp. 3.000,00</span></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/snack.jpg" alt="Bengbeng"></a>
						</div>
						<h3>Bengbeng</h3>
						<p class="product-price"><span>Rp. 2.500,00</span></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/susu.jpg" alt="Susu"></a>
						</div>
						<h3>Susu</h3>
						<p class="product-price"><span>Rp. 7.500,00</span></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
			 --}}

	<!-- end product section -->

	{{-- <!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                    	<img src="assets/img/a.jpg" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">	Produk Baru</span> of the month</h3>
                    <h4>Hikan Strwaberry</h4>
                    <div class="text"></div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2026/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section --> --}}

	{{-- <!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section --> --}}
	

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
				<div class="footer-box about-widget">
					<h2 class="widget-title">Alamat</h2>
					<li>JL. JCC KOMPLEKS PT.PLN P3B JAWA BALI NO.61 KRUKUT, 
						Krukut, Kec. Limo, Kota Depok Prov. Jawa Barat</li>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
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