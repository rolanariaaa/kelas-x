<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #35424a;
            color: white;
        }
        .form-container {
            margin: 20px 0;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-container input, .form-container button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
        }
        .form-container button {
            background-color: #35424a;
            color: white;
            border: none;
        }
        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Toko Online</h1>
    </header>
    <div class="container">
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" id="nama" placeholder="Nama Produk" required>
                <input type="number" name="harga" id="harga" placeholder="Harga" required>
                <input type="file" name="gambar" id="gambar" accept="image/*" required>
                <button type="submit" name="submit">Simpan</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'produk');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];

                    $gambar = null;
                    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                        $gambar = $_FILES['gambar']['name'];
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($gambar);
                        move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
                    }

                    if ($id) {
                        $stmt = $conn->prepare("UPDATE produk SET nama=?, harga=?, gambar=? WHERE id=?");
                        $stmt->bind_param("sdsi", $nama, $harga, $gambar, $id);
                    } else {
                        $stmt = $conn->prepare("INSERT INTO produk (nama, harga, gambar) VALUES (?, ?, ?)");
                        $stmt->bind_param("sds", $nama, $harga, $gambar);
                    }

                    $stmt->execute();
                    $stmt->close();
                }

                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $stmt = $conn->prepare("DELETE FROM produk WHERE id=?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->close();
                }

                $result = $conn->query("SELECT * FROM produk");
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['harga']; ?></td>
                        <td>
                            <?php if (!empty($row['gambar'])): ?>
                                <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" class="product-image">
                            <?php else: ?>
                                Tidak ada gambar
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
