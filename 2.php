<?php

$hariBelanja = date('l');
$totalPembelian = '';
$diskonHariSelasa = 0.05;   
$diskonPembelianBesar = 0.07;

function bayar($totalPembelian, $hariBelanja, $diskonHariSelasa, $diskonPembelianBesar) {
    $totalDiskon = 0;
    
    if ($hariBelanja == 'Tuesday') {
        $totalDiskon += $diskonHariSelasa;
    }
    if ($totalPembelian > 100000) {
        $totalDiskon += $diskonPembelianBesar;
    }
    $totalPembayaran = $totalPembelian * (1 - $totalDiskon);
    return $totalPembayaran;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $totalPembelian = isset($_POST['uang']) ? (int)$_POST['uang'] : 0;
    $akhirBelanja = bayar($totalPembelian, $hariBelanja, $diskonHariSelasa, $diskonPembelianBesar);
} else {
    $akhirBelanja = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Pembayaran</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <h2>Total Pembayaran</h2>
        <form method="POST">
            <label for="uang">Masukkan Jumlah Uang :</label>
            <input type="number" id="uang" name="uang" value="<?= htmlspecialchars($totalPembelian) ?>" required><br><br>
            <button type="submit">Bayar</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p id="result">
                Hari ini hari : <b><?= htmlspecialchars($hariBelanja) ?></b><br>
                Total pembelanjaan : <b>Rp<?= number_format($totalPembelian, 0, ',', '.') ?></b><br>
                Total yang harus dibayar : <b>Rp<?= number_format($akhirBelanja, 0, ',', '.') ?></b>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
