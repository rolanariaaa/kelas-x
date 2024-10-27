<?php

$nama = "Rolan Aria <br> Setyawardhana";
$judul = "IT SUPPORT";
$pengenalan = "Seorang siswa SMKN 2 Buduran yang<br> mampu beradaptasi dengan<br> cepat dan memiliki <br>keterampilan komunikasi yang <br> kuat.Memiliki pengalaman<br> magang sebagai staf IT di <br> beberapa perusahaan";
$kontak = ["+896-7621-7485", "@rlnaria"];

$pendidikan = "PENDIDIKAN";
$pendidikans = ["SMKN 2 Buduran", "Rekaya Perangkat Lunak</br> Tahun 2024-2027"];

$bahasa_program = "BAHASA PROGRAM";

$programs = ["HTML", "CSS", "PHP", "JAVASCRIPT"];

$data_pribadis = ["Tempat,Tanggal Lahir", "Surabaya,15 Januari 2009", "Alamat", "Kemiri Indah Barat 1", "Nomor Telephone", "+896-7621-7485", "Jenis Kelamin", "Laki-Laki", "Agama", "Islam", "Kewarga Negaraan", "Indonesia", "Email", "rolanaria963@gmail.com", "Status", "Belum Menikah"]

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="foto">
            <img src="image/foto.jpeg" alt="">
        </div>
        <div class="nama">
            <h1><?php echo $nama ?></h1>
            <div class="garis"></div>
        </div>
        <div class="judul">
            <h1><?php echo $judul ?></h1>
            <div class="garis1"></div>
        </div>
        <div class="pengenalan">
            <p><?php echo $pengenalan ?></p>
        </div>
        <div class="garis1"></div>
        <div class="kontak">
            <h1>KONTAK</h1>
            <div class="garis1"></div>
        </div>
        <div class="isi-kontak">
            <div class="container-gambar1">
                <img src="image/telephone-call.png" alt="">
                <p><?php echo $kontak[0] ?></p>
            </div>
            <div class="container-gambar2">
                <img src="image/instagram.webp" alt="">
                <p><?php echo $kontak[1] ?></p>
            </div>
        </div>
        <div class="isi-pendidikan">
            <div class="garis2"></div>
            <h1><?php echo $pendidikan ?></h1>
            <div class="garis2"></div>
            <h4><?php echo $pendidikans[0] ?></h4>
            <small><?php echo $pendidikans[1] ?> </small>
        </div>
        <div class="isi-bahasaprogram">
            <div class="garis3"></div>
            <h1><?php echo $bahasa_program ?></h1>
            <div class="garis3"></div>
            <ul>
                <li><?php echo $programs[0] ?></li>
                <li><?php echo $programs[1] ?></li>
                <li><?php echo $programs[2] ?></li>
                <li><?php echo $programs[3] ?></li>
            </ul>
        </div>
        <div class="data-pribadi">
            <div class="garis3"></div>
            <h1>DATA PRIBADI</h1>
            <div class="garis3"></div>
            <table>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[0] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[1] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[2] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[3] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[4] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[5] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[6] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[7] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[8] ?></li>
                            <div class="titik">:</div>
                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[9] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[10] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[11] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[12] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[13] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><?php echo $data_pribadis[14] ?></li>
                            <div class="titik">:</div>

                        </ul>
                    </td>
                    <td><?php echo $data_pribadis[15] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="awan">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#949090" fill-opacity="1" d="M0,288L30,277.3C60,267,120,245,180,213.3C240,181,300,139,360,117.3C420,96,480,96,540,122.7C600,149,660,203,720,202.7C780,203,840,149,900,128C960,107,1020,117,1080,128C1140,139,1200,149,1260,138.7C1320,128,1380,96,1410,80L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>
    </div>

</body>

</html>