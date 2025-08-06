<!DOCTYPE html>
<html>
<head>
    <title>Penyetoran tabungan bank mini</title>
</head>
<body>

    <h2>Form Bukti penyetoran</h2>

    <!-- Form input -->
    <form method="post" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>Tanggal Penyetoran:</label><br>
        <input type="text" name="tanggal_penyetor" required><br><br>

        <label>jumlah uang:</label><br>
        <input type="text" name="jumlah_uang" required><br><br>

        <label>Terbilang:</label><br>
        <input type="text" name="terbilang" required><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <br><br>

    <?php
    // Cek apakah form sudah disubmit
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $tanggal_penyetor = $_POST['tanggal_penyetor'];
        $jumlah_uang = $_POST['jumlah_uang'];
        $terbilang = $_POST['terbilang'];

        // Tampilkan data
        echo "<h3>Bukti Penyetoran</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Kelas: " . htmlspecialchars($kelas) . "<br>";
        echo "Jurusan: " . htmlspecialchars($jurusan) . "<br>";
        echo "Tanggal Penyetoran: " . htmlspecialchars($tanggal_penyetor) . "<br>";
        echo "jumlah uang: " . htmlspecialchars($jumlah_uang) . "<br>";
        echo "Terbilang: " . htmlspecialchars($terbilang) . "<br>";
    }
    
    ?>

</body>
</html>