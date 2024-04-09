<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku IMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fff;
            padding: 1px; /* Set padding to 1px */
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom: 5px solid #0066cc; /* Blue bottom line */
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin: 0;
        }

        header img {
            max-width: 120px; /* Adjust max-width to fit the container without padding */
            height: auto; /* Maintain aspect ratio */
            margin: 5px 10px 5px 0; /* Adjust margins for top, right, bottom, and left */
        }

        .header-buttons {
            display: flex;
            align-items: center;
        }

        .header-buttons a {
            text-decoration: none;
        }

        .header-buttons button {
            margin-left: 10px;
            padding: 8px 16px;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .header-buttons button:hover {
            background-color: #004080;
        }

        h1 {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin-top: 10px;
        }

        p {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin: 0px; /* Adjust the margin as needed */
        }

        label {
            font-family: 'Courier New', monospace;
            color: #333;
            font-weight: bold;
            margin-right: 10px;
        }

        select {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f4;
            padding: 8px;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004080;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 80%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #0066cc;
            color: white;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
        }

        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        form {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header>
        <img src="Gambar Home Website.png" alt="Logo Toko Buku IMS">
        <div class="header-buttons">
            <a href="fullcode.php"><button>Data</button></a>
            <a href="profit.php"><button>Profit</button></a>
        </div>
    </header>

    <h1>DATABASE TRANSAKSI TOKO BUKU IMS</h1>

    <p>MENAMPILKAN DATABASE PENCATATAN TRANSAKSI PENJUALAN BUKU PADA TOKO BUKU IMS<p>

    <div class="form-container">
        <form method="post" action="">
            <label for="dropboxMonth">Bulan:</label>
            <select id="dropboxMonth" name="dropboxMonth">
                <option value="">-- Semua Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>

            <label for="dropboxYear">Tahun:</label>
            <select id="dropboxYear" name="dropboxYear">
                <option value="">-- Semua Tahun --</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <label for="dropboxGenre">Genre:</label>
            <select id="dropboxGenre" name="dropboxGenre">
                <option value="">-- Semua Genre --</option>
                <option value="Komedi">Komedi</option>
                <option value="Drama">Drama</option>
                <option value="Horor">Horor</option>
                <option value="Romantis">Romantis</option>
                <option value="Novel">Novel</option>
                <option value="Cerpen">Cerpen</option>
                <option value="Komik">Komik</option>
                <option value="Fantasi">Fantasi</option>
                <option value="Biografi">Biografi</option>
                <option value="Sejarah">Sejarah</option>
                <option value="Jurnalisme">Jurnalisme</option>
                <option value="Ilmiah">Ilmiah</option>
                <option value="Self-Help">Self-Help</option>
            </select>

            <input type="submit" value="Periksa">
        </form>

        <form action="add.php" method="post">
            <input type="submit" value="Tambah">
        </form>

        <form action="delete.php" method="post">
            <input type="submit" value="Hapus">
        </form>
    </div>

    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'final project bdl';

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedMonth = isset($_POST['dropboxMonth']) ? $_POST['dropboxMonth'] : "";
        $selectedYear = isset($_POST['dropboxYear']) ? $_POST['dropboxYear'] : "";
        $selectedGenre = isset($_POST['dropboxGenre']) ? $_POST['dropboxGenre'] : "";

        if ($selectedMonth !== "" && $selectedYear !== "" && $selectedGenre !== "") {
            $query = "
                SELECT * 
                FROM transaksi
                WHERE bulan IN
                           (SELECT bulan
                            FROM transaksi
                            WHERE bulan = '$selectedMonth')
                AND tahun IN
                           (SELECT tahun
                            FROM transaksi
                            WHERE tahun = '$selectedYear')
                AND genre IN
                           (SELECT genre
                            FROM transaksi
                            WHERE genre = '$selectedGenre')";
        } elseif ($selectedMonth !== "" && $selectedYear !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE bulan IN
                           (SELECT bulan
                            FROM transaksi
                            WHERE bulan = '$selectedMonth')
                AND tahun IN
                           (SELECT tahun
                            FROM transaksi
                            WHERE tahun = '$selectedYear')";
        } elseif ($selectedMonth !== "" && $selectedGenre !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE bulan IN
                           (SELECT bulan
                            FROM transaksi
                            WHERE bulan = '$selectedMonth')
                AND genre IN
                           (SELECT genre
                            FROM transaksi
                            WHERE genre = '$selectedGenre')";
        } elseif ($selectedYear !== "" && $selectedGenre !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE tahun IN
                           (SELECT tahun
                            FROM transaksi
                            WHERE tahun = '$selectedYear')
                AND genre IN
                           (SELECT genre
                            FROM transaksi
                            WHERE genre = '$selectedGenre')";
        } elseif ($selectedMonth !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE bulan IN
                           (SELECT bulan
                            FROM transaksi
                            WHERE bulan = '$selectedMonth')";
        } elseif ($selectedYear !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE tahun IN
                           (SELECT tahun
                            FROM transaksi
                            WHERE tahun = '$selectedYear')";
        } elseif ($selectedGenre !== "") {
            $query = "
                SELECT *
                FROM transaksi
                WHERE genre IN
                           (SELECT genre
                            FROM transaksi
                            WHERE genre = '$selectedGenre')";
        } else {
            $query = "SELECT * FROM transaksi";
        }

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<table>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Nama Kasir</th>
                    </tr>";

            while ($tampil = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$tampil['kode_transaksi']}</td>
                        <td>{$tampil['id_buku']}</td>
                        <td>{$tampil['judul']}</td>
                        <td>{$tampil['genre']}</td>
                        <td>{$tampil['jumlah']}</td>
                        <td>{$tampil['harga']}</td>
                        <td>{$tampil['total_harga']}</td>
                        <td>{$tampil['metode_pembayaran']}</td>
                        <td>{$tampil['tanggal']}</td>
                        <td>{$tampil['bulan']}</td>
                        <td>{$tampil['tahun']}</td>
                        <td>{$tampil['nama_kasir']}</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Error in database query: " . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>