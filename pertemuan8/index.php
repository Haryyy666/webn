<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collase;
            margin-top: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Bagian .btn */
        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            border-bottom: 1px solid #000;
        }

        /* Bagian .info */
        .info {
            background-color: #33aadd;
            /* Biru muda/cyan */
            color: white;
        }

        /* Bagian .toolbar */
        .toolbar {
            background-color: #f1f1f1;
            /* ... beberapa baris yang terpotong/tidak terbaca ... */
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: bold;
        }

        /* Bagian .success (Sukses/Hijau) */
        .success {
            background-color: #27ae60;
            /* Hijau */
            color: white;
        }

        /* Bagian .standup (Mungkin 'Standard' atau 'Startup') */
        .standup {
            background-color: #95a5a6;
            /* Abu-abu/Perak */
            color: white;
        }

        /* Bagian .warning (Peringatan/Kuning) */
        .warning {
            background-color: #f39c12;
            /* Oranye/Kuning Tua */
            color: white;
        }

        .warning {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Mahasiswa Aktif</h1>
        <p>Status Koneksi : <span style="color:green; font-weight:bold;">terhubung ke <?php echo $db_name; ?></span></p>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Fakultas</th>
                    <th>IPK</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 1. Deklarasi Query
                $query_sql = "SELECT * FROM tb_mahasiswa ORDER BY nim ASC";

                // 2. Eksekusi Query
                $hasil_data = mysqli_query($koneksi, $query_sql);

                // 3. Looping Data
                $nomor = 1;
                while ($row = mysqli_fetch_assoc($hasil_data)) {
                    // 4. Perhitungan Predikat Berdasarkan IPK
                    $ipk = $row['ipk'];
                    $predikat = "Memuaskan";
                    $css_class = "standar";

                    if ($ipk >= 3.75) {
                        $predikat = "Cum Laude ⭐";
                        $css_class = "success"; /* Mungkin 'success', mengikuti pola umum */
                    } elseif ($ipk <= 3.00) {
                        $predikat = "Perlu Perbaikan ⚠";
                        $css_class = "warning";
                    }

                    // 5. Mencetak Baris Data (<tr>)
                    echo "<tr>";
                    echo "<td>" . $nomor . "</td>";
                    echo "<td>" . $row['nim'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td><strong>" . $ipk . "</strong></td>";
                    echo "<td><span class='badge' (scss_class)>" . $predikat . "</span></td>";
                    echo "</tr>";

                    $nomor++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>