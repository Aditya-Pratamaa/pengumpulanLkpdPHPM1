<?php
$hasil = ''; // Variabel untuk menyimpan hasil

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    function cekJawaban($namaSiswa, $jawabanSiswa) {
        // Jawaban benar
        $jawabanBenar = ['A', 'D', 'C', 'C', 'B', 'A', 'E', 'B', 'A', 'E'];
        $jumlahBenar = 0;
        $jumlahSalah = 0;

        // Hitung jumlah jawaban benar dan salah
        for ($i = 0; $i < count($jawabanBenar); $i++) {
            // Cek apakah jawaban diisi
            if (isset($jawabanSiswa[$i])) {
                if ($jawabanSiswa[$i] === $jawabanBenar[$i]) {
                    $jumlahBenar++;
                } else {
                    $jumlahSalah++;
                }
            } else {
                $jumlahSalah++;
            }
        }

        // Simpan hasil ke dalam variabel
        return "Nama: $namaSiswa <br> Jumlah Jawaban Benar: <b>$jumlahBenar</b> <br> Jumlah Jawaban Salah: <b>$jumlahSalah</b>";
    }

    // Ambil nama dan jawaban dari form
    $namaSiswa = $_POST["nama"];
    // Jawaban siswa dipecah menjadi array
    $jawabanSiswa = str_split(strtoupper($_POST["jawaban"])); // Mengubah input jawaban ke uppercase

    // Simpan hasil ke variabel $hasil
    $hasil = cekJawaban($namaSiswa, $jawabanSiswa);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jawaban</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <h2>Masukkan Jawaban</h2>
        <form method="POST">
            <label for="nama">Masukkan Nama :</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="jawaban">Masukkan Jawaban (contoh: ADCBAAEBAE):</label>
            <input type="text" id="jawaban" name="jawaban" required><br><br>
            <button type="submit">Cek Jawaban</button>
        </form>

        <!-- Hasil ditampilkan di sini setelah submit -->
        <div class="result">
            <?php
            if (!empty($hasil)) {
                echo "<hr>";
                echo $hasil;
            }
            ?>
        </div>
    </div>
</body>
</html>
