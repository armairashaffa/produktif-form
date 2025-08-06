<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Buku </title>
</head>
<body>

    <h2>Form Peminjaman Buku Perpustakaan</h2>

    <!-- Form input -->
    <form method="post" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>Tanggal Peminjaman:</label><br>
        <input type="text" name="tgl_pinjam" required><br><br>

        <label>Tanggal Pengembalian:</label><br>
        <input type="text" name="tgl_kembali" required><br><br>

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
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        // Tampilkan data
        echo "<h3>Data Peminjaman Buku</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Kelas: " . htmlspecialchars($kelas) . "<br>";
        echo "Jurusan: " . htmlspecialchars($jurusan) . "<br>";
        echo "Tanggal Peminjaman: " . htmlspecialchars($tgl_pinjam) . "<br>";
        echo "Tanggal Pengembalian: " . htmlspecialchars($tgl_kembali) . "<br>";
    }
    ?>

</body>
</html>