<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Buku</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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

        .message-container {
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
            color: #008000; /* Warna hijau untuk centang */
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

<h3> Data Transaksi</h3>

<table border="1">
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
    </tr>

    <?php

    include "phpconnect.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "select * from transaksi");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
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

        $no++;

    }

    ?>
    </table>