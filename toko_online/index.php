<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rootly Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" type="png" href="images/sandal_logo.png">
    <style>
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            /* Gunakan font keren */
            font-size: 1.8rem;
            /* Ukuran lebih besar */
            font-weight: bold;
            color: rgb(12, 133, 255);
            /* Warna utama */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            /* Efek bayangan */
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
            /* Animasi */
        }

        .navbar-brand:hover {
            color: #ff3d00;
            /* Warna saat hover */
            transform: scale(1.1);
            /* Perbesar saat hover */
        }

        /* Tambahkan font keren dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        /* Header Navigation Animation */
        .navbar-nav .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #fff;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Search Bar Animation */
        .form-control {
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .form-control:focus {
            transform: scale(1.02);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }

        /* Button Hover Effects */
        .btn {
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        /* Banner Animation Enhancement */
        .carousel-item {
            transform-origin: center;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.8s ease;
        }

        .carousel-item.active {
            animation: zoomInSlide 0.8s ease forwards;
        }

        @keyframes zoomInSlide {
            from {
                transform: scale(1.1);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Product Card Enhanced Animations */
        .product-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .product-card:hover {
            transform: translateY(-10px) rotateX(2deg);
        }

        .card-img-top {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            backface-visibility: hidden;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.08);
        }

        /* Price Tag Animation */
        .card-text {
            position: relative;
            display: inline-block;
        }

        .card-text::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #007bff;
            transition: width 0.3s ease;
        }

        .product-card:hover .card-text::before {
            width: 100%;
        }

        /* Footer Link Animations */
        footer .text-decoration-none {
            position: relative;
            transition: all 0.3s ease;
        }

        footer .text-decoration-none::before {
            content: '→';
            position: absolute;
            left: -20px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        footer .text-decoration-none:hover {
            padding-left: 20px;
        }

        footer .text-decoration-none:hover::before {
            opacity: 1;
            left: 0;
        }

        /* Social Media Icons Animation */
        .bi {
            transition: transform 0.3s ease;
        }

        footer a:hover .bi {
            transform: scale(1.2) rotate(5deg);
        }

        /* Scroll Animation for Products Container */
        .products-wrapper {
            scroll-behavior: smooth;
        }

        .scroll-btn {
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .scroll-btn:hover {
            opacity: 1;
            transform: translateY(-50%) scale(1.1);
        }

        /* Loading Animation for Images */
        .card-img-top {
            opacity: 0;
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Page Load Animation */
        body {
            animation: pageLoad 0.6s ease-out;
        }

        @keyframes pageLoad {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi hover untuk product card */
        .product-card {
            transition: all 0.3s ease-in-out;
            position: relative;
            z-index: 1;
        }

        .product-card .card {
            transition: all 0.3s ease;
            border: 1px solid #eee;
            overflow: hidden;
        }

        /* Scale effect on hover */
        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-card:hover .card {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: transparent;
        }

        /* Image zoom effect */
        .product-card .card-img-top {
            transition: transform 0.5s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.1);
        }

        /* Button animation */
        .product-card .btn-primary {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .product-card .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .product-card:hover .btn-primary:before {
            left: 100%;
        }

        /* Price animation */
        .product-card .card-text {
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .product-card:hover .card-text {
            transform: scale(1.1);
            color: #007bff;
            font-weight: bold;
        }

        /* Title animation */
        .product-card .card-title {
            transition: all 0.3s ease;
            position: relative;
            padding-bottom: 5px;
        }

        .product-card .card-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #007bff;
            transition: all 0.3s ease;
        }

        .product-card:hover .card-title:after {
            width: 100%;
        }

        /* Card body background effect */
        .product-card .card-body {
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
            background: white;
        }

        .product-card:hover .card-body {
            background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        }

        /* Container styling */
        .carousel {
            position: relative;
            overflow: hidden;
            width: 100%;
            /* Ubah tinggi menjadi lebih kecil */
            height: 370px;
            /* Disesuaikan sesuai kebutuhan */
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            height: 90%;
        }

        .carousel-item {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: transform 0.3s ease-in-out;
            transform: translateX(100%);
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Active slide */
        .carousel-item.active {
            opacity: 1;
            transform: translateX(0);
        }

        /* Previous slide */
        .carousel-item.active.carousel-item-start {
            transform: translateX(-100%);
            opacity: 0;
            transition: all 0.3s ease-out;
        }

        /* Next slide */
        .carousel-item.active.carousel-item-next {
            transform: translateX(100%);
            transition: all 0.3s ease-out;
        }

        /* Entering slides */
        .carousel-item.carousel-item-next.carousel-item-start,
        .carousel-item.carousel-item-prev.carousel-item-end {
            transform: translateX(0);
            opacity: 1;
            transition: all 0.3s ease-in;
        }

        /* Control buttons styling */
        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
        }

        /* Hover effects */
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Faster keyframe animations */
        @keyframes slideFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .card-img-top {
            height: 200px;
            /* Atur tinggi gambar, misalnya 200px */
            object-fit: cover;
            /* Gambar akan disesuaikan dengan rasio yang benar */
        }

        .banner-kiri {
            height: 300px;
        }

        @keyframes slideToLeft {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 1rem;
        }

        .product-image {
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .product-title {
            margin-bottom: 0.5rem;
        }

        .product-price {
            margin-bottom: 1rem;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 1rem;
        }

        .product-image {
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .product-title {
            margin-bottom: 0.5rem;
        }

        .product-price {
            margin-bottom: 1rem;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            background-color: #0066ff;
            color: white;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            margin-top: auto;
        }

        /* Container untuk kartu produk */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            background-color: #0066ff;
            color: white;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            margin-top: auto;
        }

        /* Container untuk kartu produk */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }

        .products-container {
            position: relative;
            padding: 20px 0;
        }

        .products-wrapper {
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: none;
            /* Hide scrollbar for IE and Edge */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
            padding: 10px 0;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .products-wrapper::-webkit-scrollbar {
            display: none;
        }

        .product-card {
            display: inline-block;
            width: 280px;
            margin-right: 20px;
            white-space: normal;
            vertical-align: top;
        }

        .product-card:last-child {
            margin-right: 0;
        }

        /* Optional scroll buttons */
        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-btn:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .scroll-btn.left {
            left: 10px;
        }

        .scroll-btn.right {
            right: 10px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="bg-dark text-white py-3">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Rootly Footwear</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    </ul>
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Cari produk...">
                        <button class="btn btn-outline-light" type="submit">Cari</button>
                    </form>
                    <div class="d-flex">
                        <a href="#" class="btn btn-outline-light me-2">Register</a>
                        <a href="#" class="btn btn-light">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="container my-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <!-- Static Banner -->
                <div class="card">
                    <img src="images/lovyu.webp" class="card-img-top banner-kiri" alt="Banner Statis">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <!-- Dynamic Banner -->
                <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/rtt.webp" class="d-block w-100" alt="Banner Dinamis 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rtlw.webp" class="d-block w-100" alt="Banner Dinamis 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rootly.webp" class="d-block w-100" alt="Banner Dinamis 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section class="container my-4">
        <h2 class="text-center mb-4">Produk Kami</h2>
        <div class="products-container">
            <div class="products-wrapper">
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/sandal slop.jpg" class="card-img-top" alt="Produk 1">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Slip On Pria Black Motif Terkeren Saat Ini</h5>
                            <p class="card-text">Rp 56.700</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/rtlyy.jpg" class="card-img-top" alt="Produk 2">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Selop Pria Full Karet Grey Ternyaman Dan Empuk</h5>
                            <p class="card-text">Rp 52.400</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/sdl.jpg" class="card-img-top" alt="Produk 3">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Starboy Pria Simple Slop Lucida Hitam polos</h5>
                            <p class="card-text">Rp 55.900</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/sdll.jpg" class="card-img-top" alt="Produk 4">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Pria Slide Full karet Ringan Rush Abu</h5>
                            <p class="card-text">Rp 55.900</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/rtt.jpg" class="card-img-top" alt="Produk 5">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Pria Premium Comfort Series Black</h5>
                            <p class="card-text">Rp 54.700</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="card h-100">
                        <img src="images/rootly.jpg" class="card-img-top" alt="Produk 6">
                        <div class="card-body">
                            <h5 class="card-title">Rootly - Sandal Pria Sport Edition Navy Blue</h5>
                            <p class="card-text">Rp 58.300</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="mb-3">Menu</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Produk</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="mb-3">Metode Pembayaran</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-credit-card me-2"></i>Transfer Bank</li>
                        <li class="mb-2"><i class="bi bi-wallet2 me-2"></i>E-Wallet</li>
                        <li class="mb-2"><i class="bi bi-credit-card-2-front me-2"></i>Kartu Kredit</li>
                        <li class="mb-2"><i class="bi bi-cash-coin me-2"></i>COD</li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="mb-3">Media Sosial</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook me-2"></i>Rootly.FB</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram me-2"></i>rlnaria</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter me-2"></i>Rootly.X</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none"><i class="bi bi-youtube me-2"></i>Rootly.Channel</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i>rootly_footwear.com</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i>(021) 235-672</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Tunjungan Plaza, Surabaya</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Rootly Footwear. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>