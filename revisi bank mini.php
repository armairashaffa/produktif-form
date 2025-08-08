<!DOCTYPE html>
<html>
<head>
    <title>Penyetoran tabungan bank mini</title>
</head>
<body>

    <h2>Form Bukti Penyetoran</h2>

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

        <label>Kelompok Nasabah:</label><br>
        <select name="nasabah" required>
            <option value="">Pilih</option>
            <option value="siswa/i">siswa/i</option>
            <option value="guru">guru</option> 
            <option value="staff tu">staff tu</option>
            <option value="kas kelas">kas kelas</option>
        </select><br><br>

        <label>Tanggal :</label><br>
        <input type="date" name="tanggal_bulan" required><br><br>

        <label>Jenis:</label><br>
        <select name="jenis" required>
            <option value="">Pilih</option>
            <option value="Penyetoran">Penyetoran</option>
            <option value="Penarikan">Penarikan</option>
        </select><br><br>

        <label>No rekening:</label><br>
        <input type="text" name="no_rekening" required><br><br>

        <label>Jumlah Uang:</label><br>
        <input type="number" name="jumlah_uang" required><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <br><br>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $nasabah = $_POST['nasabah'];
        $tanggal_bulan = $_POST['tanggal_bulan'];
        $jenis = $_POST['jenis'];
        $no_rekening = $_POST['no_rekening'];
        $jumlah_uang = $_POST['jumlah_uang'];

        // saldo awal 
        $saldo = 500000;

        // hitung saldo akhir
        if ($jenis == "Penyetoran") {
            $saldo_akhir = $saldo + $jumlah_uang;
        } else {
            $saldo_akhir = $saldo - $jumlah_uang;
        }

        // Tampilkan data
        echo "<h3>Bukti Penyetoran</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Kelas: " . htmlspecialchars($kelas) . "<br>";
        echo "Jurusan: " . htmlspecialchars($jurusan) . "<br>";
        echo "Kelompok Nasabah: " . htmlspecialchars($nasabah) . "<br>";
        echo "Tanggal: " . htmlspecialchars($tanggal_bulan) . "<br>";
        echo "Jenis: " . htmlspecialchars($jenis) . "<br>";
        echo "No Rekening: " . htmlspecialchars($no_rekening) . "<br>";
        echo "Jumlah Uang: Rp " . number_format($jumlah_uang, 0, ',', '.') . "<br><br>";

        echo "Saldo Awal: Rp " . number_format($saldo, 0, ',', '.') . "<br>";
        echo "Saldo Akhir: Rp " . number_format($saldo_akhir, 0, ',', '.');
    }
    ?>

</body>
</html>