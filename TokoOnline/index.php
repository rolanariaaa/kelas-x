<<<<<<< HEAD
<?php

// login.php - Login page
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT id, password, username FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: main.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 2 Stroke Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        /* Copy the :root and basic styles from your main CSS */
        .login-container {
            max-width: 400px;
            margin: 120px auto;
            padding: 2rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group input {
            padding: 0.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .submit-btn {
            background: var(--primary);
            color: var(--white);
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Masuk ke Akun Anda</h2>
        
        <?php if(isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="login" class="submit-btn">Masuk</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>

<?php
// register.php - Registration page
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Basic validation
    $errors = [];
    
    if (strlen($password) < 8) {
        $errors[] = "Password harus minimal 8 karakter";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Password tidak cocok";
    }
    
    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$name]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "Email sudah terdaftar";
    }
    
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->execute([$name,  $hashed_password]);
            $_SESSION['register_success'] = true;
            header("Location: login.php");
            exit();
        } catch(PDOException $e) {
            $errors[] = "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - 2 Stroke Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Use the same styles as login.php, just change the container max-width */
        .login-container {
            max-width: 450px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Daftar Akun Baru</h2>
        
        <?php if(!empty($errors)): ?>
            <?php foreach($errors as $error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" name="register" class="submit-btn">Daftar</button>
        </form>

        <div class="register-link">
            Sudah punya akun? <a href="login.php">Masuk</a>
        </div>
    </div>
</body>
</html>

<?php
// users.sql - Database structure
/*
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/
?>
=======
<?php

// login.php - Login page
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT id, password, username FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: main.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 2 Stroke Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        /* Copy the :root and basic styles from your main CSS */
        .login-container {
            max-width: 400px;
            margin: 120px auto;
            padding: 2rem;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group input {
            padding: 0.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .submit-btn {
            background: var(--primary);
            color: var(--white);
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-light);
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Masuk ke Akun Anda</h2>
        
        <?php if(isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="login" class="submit-btn">Masuk</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>

<?php
// register.php - Registration page
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Basic validation
    $errors = [];
    
    if (strlen($password) < 8) {
        $errors[] = "Password harus minimal 8 karakter";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Password tidak cocok";
    }
    
    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$name]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "Email sudah terdaftar";
    }
    
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->execute([$name,  $hashed_password]);
            $_SESSION['register_success'] = true;
            header("Location: login.php");
            exit();
        } catch(PDOException $e) {
            $errors[] = "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - 2 Stroke Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Use the same styles as login.php, just change the container max-width */
        .login-container {
            max-width: 450px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Daftar Akun Baru</h2>
        
        <?php if(!empty($errors)): ?>
            <?php foreach($errors as $error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" name="register" class="submit-btn">Daftar</button>
        </form>

        <div class="register-link">
            Sudah punya akun? <a href="login.php">Masuk</a>
        </div>
    </div>
</body>
</html>

<?php
// users.sql - Database structure
/*
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/
?>
>>>>>>> 4e8b15f (first commit)
