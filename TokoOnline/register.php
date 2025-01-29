<?php
// register.php
require_once 'config.php';
session_start();

$errors = []; // Initialize errors array
$success = false; // Initialize success variable
$username = ''; // Initialize username variable
$password = ''; // Initialize password variable
$role = ''; // Initialize role variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = $_POST['role'];

    // Validate inputs (add your validation logic here)
    if (empty($username) || empty($password) || empty($role)) {
        $errors[] = "Semua field harus diisi.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Password dan konfirmasi password tidak cocok.";
    }

    if (empty($errors)) {
        try {
            $sql = "INSERT INTO users (username, password, role, created_at) 
                    VALUES (?, ?, ?, NOW())";
            $stmt = $pdo->prepare($sql);
            
            // Debug: Print the values being inserted
            echo "Username: " . $username . "<br>";
            echo "Role: " . $role . "<br>";
            
            $result = $stmt->execute([
                $username,
                password_hash($password, PASSWORD_DEFAULT),
                $role
            ]);
            
            // Debug: Check if insert was successful
            if ($result) {
                echo "Insert successful. Last Insert ID: " . $pdo->lastInsertId();
                $success = true; // Set success to true
            } else {
                echo "Insert failed. Error info: ";
                print_r($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            // More detailed error logging
            error_log("Registration Error: " . $e->getMessage());
            echo "Error: " . $e->getMessage(); // Show error for debugging
            $errors[] = "Terjadi kesalahan sistem. Silakan coba lagi nanti.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        .register-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group select {
            background-color: white;
            cursor: pointer;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn-register:hover {
            background: #45a049;
        }

        .error-message {
            color: #ff0000;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success-message {
            color: #4CAF50;
            background: #e6ffe6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="register-form" method="POST" action="">
            <h2 class="form-title">Daftar Akun Baru</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="success-message">
                    <p>Registrasi berhasil! Silakan login.</p>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" 
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="admin" <?php echo (isset($_POST['role']) && $_POST['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="customer" <?php echo (isset($_POST['role']) && $_POST['role'] === 'customer') ? 'selected' : ''; ?>>Customer</option>
                </select>
            </div>

            <button type="submit" name="register" class="btn-register">Daftar</button>

            <div class="login-link">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </div>
        </form>
    </div>
</body>
</html>
