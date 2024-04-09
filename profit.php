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
            padding: 1px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom: 5px solid #0066cc;
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
            max-width: 120px;
            height: auto;
            margin: 5px 10px 5px 0;
        }

        h1 {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin-top: 10px;
            margin-bottom: 10px; /* Add margin-bottom to create space */
        }

        p {
            font-family: 'Helvetica', sans-serif;
            color: #0066cc;
            margin-top: 10px;
            margin-bottom: 10px; /* Add margin-bottom to create space */
        }

        img {
            max-width: 100%;
            margin-bottom: 20px;
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
        
        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        form {
            display: flex; /* Use flexbox for form container */
            align-items: center; /* Align items vertically in the center */
            margin-right: 10px;
        }

        label {
            font-family: 'Courier New', monospace;
            color: #333;
            font-weight: bold;
            margin-right: 10px;
            margin-bottom: 0; /* Adjust margin-bottom */
        }

        select {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f4;
            padding: 5px;
            margin-bottom: 2px;
            margin-right: 20px; /* Add margin-right */
        }

        input[type="submit"] {
            padding: 6px 10px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 5px; /* Add margin-bottom */
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
            background-color: #f2f2f2;
        }

        th {
            background-color: #0066cc;
            color: white;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
        }

        .content-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            margin-top: 10px;
        }

        .table-container {
            margin-top: 10px;
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

    <p>MENAMPILKAN BULAN DENGAN PROFIT DI ATAS RATA-RATA<p>

    <div class="content-container">
        <div class="form-container">
            <form method="post" action="">
                <label for="dropboxYearProfit">Tahun:</label>
                <select id="dropboxYearProfit" name="dropboxYearProfit">
                    <option value="">-- Pilih Tahun --</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
                <input type="submit" name="analyzeProfit" value="Analisis Profit">
            </form>
        </div>

        <div class="table-container">
            <?php
            // Your existing PHP code for table generation
            ?>
        </div>
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
        $selectedYear = isset($_POST['dropboxYear']) ? $_POST['dropboxYear'] : "";
    
        if (isset($_POST['analyzeProfit'])) {
            $selectedYearProfit = isset($_POST['dropboxYearProfit']) ? $_POST['dropboxYearProfit'] : "";
    
            if (!empty($selectedYearProfit)) {
                // Query to get months with total profit above average for the selected year
                $queryProfit = "
                SELECT transaksi.bulan, SUM(transaksi.total_harga) as total_harga
                FROM transaksi
                LEFT JOIN profit ON transaksi.tahun = profit.tahun AND transaksi.bulan = profit.bulan
                WHERE transaksi.tahun = '$selectedYearProfit'
                GROUP BY transaksi.bulan
                HAVING AVG(transaksi.total_harga) >= (
                    SELECT AVG(subquery.avg_total_harga)
                    FROM (
                        SELECT transaksi.bulan, AVG(transaksi.total_harga) as avg_total_harga
                        FROM transaksi
                        LEFT JOIN profit ON transaksi.tahun = profit.tahun AND transaksi.bulan = profit.bulan
                        WHERE transaksi.tahun = '$selectedYearProfit'
                        GROUP BY transaksi.bulan
                    ) AS subquery
                )
            ";            
    
                $resultProfit = mysqli_query($koneksi, $queryProfit);
    
                if ($resultProfit) {
                    echo "<table>
                            <tr>
                                <th>Bulan</th>
                                <th>Total Profit</th>
                            </tr>";
    
                    while ($tampilProfit = mysqli_fetch_assoc($resultProfit)) {
                        echo "<tr>
                                <td>{$tampilProfit['bulan']}</td>
                                <td>{$tampilProfit['total_harga']}</td>
                            </tr>";
                    }
    
                    echo "</table>";
                } else {
                    echo "Error dalam query analisis profit: " . mysqli_error($koneksi);
                }
            } else {
                echo "Mohon memilih tahun terlebih dahulu sebelum melakukan analisis profit.";
            }
        }
    }
    
    // Your existing PHP code
    mysqli_close($koneksi);
    ?>
</body>

</html>