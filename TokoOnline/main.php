<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <title>2StrokeStore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        :root {
            --primary: #FF4B2B;
            --secondary: #2B2B2B;
            --accent: #FFD700;
            --text: #333333;
            --light: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
        }

        .navbar {
            position: fixed;
            width: 100%;
            padding: 1rem 5%;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            position: relative;
            transition: color 0.3s;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cart-wrapper {
            position: relative;
            cursor: pointer;
        }

        .cart {
            font-size: 1.5rem;
            color: var(--secondary);
            transition: color 0.3s;
        }

        .cart:hover {
            color: var(--primary);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--primary);
            color: var(--light);
            border-radius: 50%;
            padding: 0.2rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .hero .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                45deg,
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.3)
            );
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.5rem;
            color: var(--light);
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .btn {
            background-color: var(--primary);
            color: var(--light);
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 75, 43, 0.4);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-motorcycle"></i>
            2StrokeStore
        </a>
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Produk</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </div>
        <div class="cart-wrapper">
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="cart-count">3</div>
        </div>
    </nav>

    <div class="hero">
        <img src="/api/placeholder/1920/1080" alt="A motorcycle parked near the sea with a person sitting beside it">
        <div class="overlay">
            <h1>2 STROKE GARAGE</h1>
            <p>Koleksi 2 Stroke Terbaik 2025</p>
            <a href="produk.php" class="btn">Eksplor Koleksi →</a>
        </div>
    </div>
</body>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <title>2StrokeStore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        :root {
            --primary: #FF4B2B;
            --secondary: #2B2B2B;
            --accent: #FFD700;
            --text: #333333;
            --light: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
        }

        .navbar {
            position: fixed;
            width: 100%;
            padding: 1rem 5%;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            position: relative;
            transition: color 0.3s;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cart-wrapper {
            position: relative;
            cursor: pointer;
        }

        .cart {
            font-size: 1.5rem;
            color: var(--secondary);
            transition: color 0.3s;
        }

        .cart:hover {
            color: var(--primary);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--primary);
            color: var(--light);
            border-radius: 50%;
            padding: 0.2rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .hero .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                45deg,
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.3)
            );
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.5rem;
            color: var(--light);
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .btn {
            background-color: var(--primary);
            color: var(--light);
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 75, 43, 0.4);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-motorcycle"></i>
            2StrokeStore
        </a>
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Produk</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </div>
        <div class="cart-wrapper">
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="cart-count">3</div>
        </div>
    </nav>

    <div class="hero">
        <img src="/api/placeholder/1920/1080" alt="A motorcycle parked near the sea with a person sitting beside it">
        <div class="overlay">
            <h1>2 STROKE GARAGE</h1>
            <p>Koleksi 2 Stroke Terbaik 2025</p>
            <a href="produk.php" class="btn">Eksplor Koleksi →</a>
        </div>
    </div>
</body>
>>>>>>> 4e8b15f (first commit)
</html>