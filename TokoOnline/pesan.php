<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Sepeda Motor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="images/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            color: #2d3436;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .form-header p {
            color: #636e72;
            font-size: 16px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2d3436;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .motor-preview {
            grid-column: 1 / -1;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .motor-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Menetapkan 3 kolom */
            gap: 15px;
            margin-top: 15px;
        }

        .motor-option {
            background: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .motor-option img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        .motor-option p {
            margin: 0;
            font-size: 14px;
            color: #2d3436;
            font-weight: 500;
        }

        .motor-option.selected {
            border-color: #3498db;
            background: #ebf5ff;
        }

        .motor-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .submit-btn {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .submit-btn.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px;
            }

            .form-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Pemesanan Sepeda Motor</h1>
            <p>Pilih motor impian Anda dan isi formulir pemesanan di bawah ini</p>
        </div>

        <form action="process_order.php" method="post" id="orderForm">
            <div class="motor-preview">
                <label>Pilih Motor:</label>
                <div class="motor-grid">
                    <div class="motor-option" data-value="RX King">
                        <img src="images/rx.webp" alt="RX King">
                        <p>RX King</p>
                    </div>
                    <div class="motor-option" data-value="Ninja SS">
                        <img src="images/SS.jpg" alt="Ninja SS">
                        <p>Ninja SS</p>
                    </div>
                    <div class="motor-option" data-value="125Z">
                        <img src="images/125z.jpg" alt="125Z">
                        <p>125Z</p>
                    </div>
                    <div class="motor-option" data-value="NSR">
                        <img src="images/nsr.webp" alt="NSR">
                        <p>NSR</p>
                    </div>
                    <div class="motor-option" data-value="Ninja RR">
                        <img src="images/rr.jpg" alt="Ninja RR">
                        <p>Ninja RR</p>
                    </div>
                    <div class="motor-option" data-value="RGR 150">
                        <img src="images/rgr1.jpg" alt="RGR 150">
                        <p>RGR 150</p>
                    </div>
                </div>
                <input type="hidden" id="motor" name="motor" required>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <div class="input-icon">
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon">
                        <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon">
                        <input type="tel" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required>
                        <i class="fas fa-phone"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon">
                        <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan Tambahan (Opsional):</label>
                    <textarea id="catatan" name="catatan" rows="3" placeholder="Tuliskan catatan tambahan"></textarea>
                </div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-paper-plane"></i> Kirim Pesanan
            </button>
        </form>
    </div>

    <script>
        // JavaScript untuk interaksi dengan form
        const motorOptions = document.querySelectorAll('.motor-option');
        const motorInput = document.getElementById('motor');
        const orderForm = document.getElementById('orderForm');
        const submitBtn = document.getElementById('submitBtn');

        motorOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Log motor yang dipilih
                console.log("Motor dipilih:", option.dataset.value);

                motorOptions.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                motorInput.value = option.dataset.value;
            });
        });

        orderForm.addEventListener('submit', (event) => {
            // Cek apakah semua input sudah valid
            if (!motorInput.value) {
                alert('Harap pilih motor terlebih dahulu.');
                console.log("Formulir tidak dapat dikirim: motor belum dipilih.");
                event.preventDefault();
                return;
            }
            console.log("Formulir dikirim:", {
                nama: document.getElementById('nama').value,
                email: document.getElementById('email').value,
                telepon: document.getElementById('telepon').value,
                alamat: document.getElementById('alamat').value,
                catatan: document.getElementById('catatan').value,
                motor: motorInput.value
            });

            // Tampilkan status loading pada tombol submit
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner"></i> Mengirim...';
        });
    </script>
</body>
</html>

