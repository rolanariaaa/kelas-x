<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'tokoonline'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $motor = $_POST['motor'];
    $alamat = $_POST['alamat'];

    // Siapkan dan eksekusi query untuk menyimpan data
    $stmt = $pdo->prepare("INSERT INTO orders (nama, email, telepon, motor, alamat) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nama, $email, $telepon, $motor, $alamat]);

    header("location: order_sukses.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
