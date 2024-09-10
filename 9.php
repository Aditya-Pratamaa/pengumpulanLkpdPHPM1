<?php
// Fungsi untuk mencari jenis koin
function cariKoin($jumlahUang) {
    $koin = [1000, 500, 200, 100, 50];
    $hasil = [];

    foreach ($koin as $nilaiKoin) {
        while ($jumlahUang >= $nilaiKoin) {
            $jumlahUang -= $nilaiKoin;
            $hasil[] = $nilaiKoin;
        }
    }
    return $hasil;
}

// Inisialisasi variabel hasil
$koinYangDigunakan = [];
$jumlahUang = '';

// Mengecek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlahUang = isset($_POST['koin']) ? (int)$_POST['koin'] : 0;
    $koinYangDigunakan = cariKoin($jumlahUang);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Koin</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <h2>Jenis Koin</h2>
        <form method="POST">
            <label for="koin">Masukkan Jumlah Uang :</label>
            <input type="number" id="koin" name="koin" value="<?= htmlspecialchars($jumlahUang) ?>" required><br><br>
            <button type="submit">Cari</button>
        </form>

        <?php if (!empty($koinYangDigunakan)): ?>
            <p id="result">
                Jumlah Uang: <b><?= htmlspecialchars($jumlahUang) ?></b><br>
                Jenis Koin: 
                <ul>
                    <?php foreach ($koinYangDigunakan as $koin): ?>
                        <li><?= $koin ?></li>
                    <?php endforeach; ?>
                </ul>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
