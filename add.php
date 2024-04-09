<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Buku</title>
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
            position: relative;
        }

        h1 {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 80%;
            margin-top: 20px;
            padding: 20px;
            border: 3px solid #0066cc;
            border-radius: 10px;
            background-color: #fff;
        }

        .form-column {
            flex: 1;
            text-align: left;
            padding-right: 10px;
            margin-bottom: 20px;
        }

        .button-container {
            flex: 100%;
            margin-top: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            border: 3px solid #0066cc;
            border-radius: 10px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #0066cc;
            color: white;
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
            width: 100%;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 10px;
            font-size: 16px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #004080;
        }

        #result-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 3px solid #0066cc;
            border-radius: 10px;
            background-color: #fff;
            z-index: 999;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #tick-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #tick {
            font-size: 48px;
            color: #008000;
            /* Warna hijau untuk centang */
            transform-origin: center;
            animation: tickAnimation 0.5s ease-out;
        }

        #message {
            margin-top: 10px;
            font-size: 18px;
        }

        @keyframes tickAnimation {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <a href="fullcode.php" style="position: absolute; top: 20px; right: 20px; text-decoration: none;">
        <input type="button" value="Kembali" style="background-color: #0066cc; color: #fff; border: none; border-radius: 5px; padding: 10px; cursor: pointer;">
    </a>

    <h1>Tambah Transaksi Buku</h1>

    <form action="add.php" method="post">
        <div class="form-column">
            <label for="kode_transaksi">Kode Transaksi</label>
            <input type="text" name="kode_transaksi">

            <label for="id_buku">ID Buku</label>
            <input type="text" name="id_buku">

            <label for="judul">Judul</label>
            <input type="text" name="judul">

            <label for="genre">Genre</label>
            <input type="text" name="genre">

            <label for="judul">Jumlah</label>
            <input type="text" name="jumlah">

            <label for="genre">Harga</label>
            <input type="text" name="harga">
        </div>

        <div class="form-column">
            <label for="judul">Total Harga</label>
            <input type="text" name="total_harga">

            <label for="genre">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran">

            <label for="judul">Tanggal</label>
            <input type="text" name="tanggal">

            <label for="genre">Bulan</label>
            <input type="text" name="bulan">

            <label for="judul">Tahun</label>
            <input type="text" name="tahun">

            <label for="genre">Nama Kasir</label>
            <input type="text" name="nama_kasir">
        </div>

        <div class="button-container">
            <input type="submit" name="proses" value="Simpan">
        </div>
    </form>

    <div id="result-container">
        <div id="tick-container">
            <div id="tick" class="animate-tick">&#10003;</div>
        </div>
        <div id="message">Transaksi baru telah tersimpan</div>
    </div>

    <?php
    include "phpconnect.php";

    if (isset($_POST['proses'])) {
        mysqli_query($koneksi, "INSERT INTO transaksi SET  
        kode_transaksi = '$_POST[kode_transaksi]',
        id_buku = '$_POST[id_buku]',
        judul = '$_POST[judul]',
        genre = '$_POST[genre]',
        jumlah = '$_POST[jumlah]',
        harga = '$_POST[harga]',
        total_harga = '$_POST[total_harga]',
        metode_pembayaran = '$_POST[metode_pembayaran]',
        tanggal = '$_POST[tanggal]',
        bulan = '$_POST[bulan]',
        tahun = '$_POST[tahun]',
        nama_kasir = '$_POST[nama_kasir]'");

        echo "<script>
                document.getElementById('result-container').style.display = 'flex';
              </script>";
    }
    ?>
</body>

</html>