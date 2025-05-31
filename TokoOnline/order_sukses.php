<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        @keyframes slideIn {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #2d3436;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            line-height: 1.6;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.8s ease-out;
            max-width: 90%;
            width: 400px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            animation: checkmark 0.8s ease-in-out;
        }

        .success-icon i {
            color: white;
            font-size: 40px;
        }

        h1 {
            color: #28a745;
            margin: 20px 0;
            font-size: 28px;
            font-weight: 600;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
            color: #636e72;
        }

        .order-number {
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin: 15px 0;
            font-family: monospace;
            font-size: 16px;
            color: #2d3436;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 30px;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(45deg, #007bff, #0056b3);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }

        .btn i {
            margin-right: 8px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h1>Pesanan Berhasil!</h1>
        <p>Terima kasih telah memesan. Pesanan Anda sedang diproses.</p>
        <a href="index.php" class="btn">
            <i class="fas fa-home"></i>
            Kembali ke Beranda
        </a>
    </div>
</body>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        @keyframes slideIn {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #2d3436;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            line-height: 1.6;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.8s ease-out;
            max-width: 90%;
            width: 400px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            animation: checkmark 0.8s ease-in-out;
        }

        .success-icon i {
            color: white;
            font-size: 40px;
        }

        h1 {
            color: #28a745;
            margin: 20px 0;
            font-size: 28px;
            font-weight: 600;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
            color: #636e72;
        }

        .order-number {
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin: 15px 0;
            font-family: monospace;
            font-size: 16px;
            color: #2d3436;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 30px;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(45deg, #007bff, #0056b3);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }

        .btn i {
            margin-right: 8px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h1>Pesanan Berhasil!</h1>
        <p>Terima kasih telah memesan. Pesanan Anda sedang diproses.</p>
        <a href="index.php" class="btn">
            <i class="fas fa-home"></i>
            Kembali ke Beranda
        </a>
    </div>
</body>
>>>>>>> 4e8b15f (first commit)
</html>