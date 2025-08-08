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
        <select name="kelas" required>
            <option value="">Pilih</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select><br><br>

        <label>Jurusan:</label><br>
        <select name="jurusan" required>
            <option value="">Pilih</option>
            <option value="MPLB">MPLB</option>
            <option value="AKL">AKL</option>
            <option value="PS">PS</option>
            <option value="DKV">DKV</option>
            <option value="KL">KL</option>
            <option value="TL">TL</option>
            <option value="TKJ">TKJ</option>
            <option value="RPL">RPL</option>
            <option value="TSM">TSM</option>
            <option value="TPM">TPM</option>
        </select><br><br>


        
        <label>Judul Buku:</label><br>
        <select name="buku" required>
            <option value="">Pilih</option>
            <option value="bahasa indonesia">bahasa indonesia</option>
            <option value="produktif">produktiff</option>
            <option value="puisi">puisi</option>
            <option value="sejarah">sejarah</option>
        </select><br><br>

        


        <label>Tanggal Peminjaman:</label><br>
        <input type="date" name="tgl_pinjam" required><br><br>

        <label>Tanggal Pengembalian:</label><br>
        <input type="date" name="tgl_kembali" required><br><br>

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
        $buku = $_POST['buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        // Tampilkan data
        echo "<h3>Data Peminjaman Buku</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Kelas: " . htmlspecialchars($kelas) . "<br>";
        echo "Jurusan: " . htmlspecialchars($jurusan) . "<br>";
        echo "Judul Buku: " . htmlspecialchars($buku) . "<br>";
        echo "Tanggal Peminjaman: " . htmlspecialchars($tgl_pinjam) . "<br>";
        echo "Tanggal Pengembalian: " . htmlspecialchars($tgl_kembali) . "<br>";
    }
    ?>

</body>
</html>
