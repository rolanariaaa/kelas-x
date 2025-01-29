<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tokoonline');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    die("Maaf, terjadi kesalahan pada sistem.");
}

// login.php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: main.php");
    exit();
}

// Process login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $errors = [];
    
    // Validate input
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errors[] = "Email tidak valid!";
    }
    
    $password = $_POST['password'] ?? '';
    if (empty($password)) {
        $errors[] = "Password tidak boleh kosong!";
    }
    
    if (empty($errors)) {
        try {
            $sql = "SELECT id, email, password, name, status FROM users WHERE email = ? AND status = 'active' LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                // Prevent session fixation
                session_regenerate_id(true);
                
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['last_activity'] = time();
                
                // Optional: Log successful login
                logLoginAttempt($pdo, $user['id'], true);
                
                header("Location: main.php");
                exit();
            } else {
                // Optional: Log failed login attempt
                logLoginAttempt($pdo, null, false, $email);
                $errors[] = "Email atau password salah!";
            }
        } catch (PDOException $e) {
            error_log("Login Error: " . $e->getMessage());
            $errors[] = "Terjadi kesalahan sistem. Silakan coba lagi nanti.";
        }
    }
}

// Optional: Function to log login attempts
function logLoginAttempt($pdo, $userId = null, $success = false, $email = null) {
    try {
        $sql = "INSERT INTO login_attempts (user_id, email, success, ip_address, attempt_time) 
                VALUES (?, ?, ?, ?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $userId,
            $email,
            $success ? 1 : 0,
            $_SERVER['REMOTE_ADDR']
        ]);
    } catch (PDOException $e) {
        error_log("Login Attempt Logging Error: " . $e->getMessage());
    }
}
?>