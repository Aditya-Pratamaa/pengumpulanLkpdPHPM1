<?php
function simbol($str) {
    preg_match_all('/[\'^£$%&*()}{@#~?><>,|!=_+¬-]/', $str, $matches);  
    return $matches[0]; 
}
$str = isset($_POST['symbol']) ? $_POST['symbol'] : ""; 

$simbol_terdeteksi = simbol($str);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container label {
            display: block;
            font-size: 14px;
            margin-bottom: 1.3rem;
            color: #555;
        }

        .form-container input{
            width: 92%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.85);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #3781DE;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #2a6bbd;
        }

        .form-container p#result {
            margin-top: 2rem;
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 700px) {
            .form-container {
                width: 50%;
                padding: 40px;
            }

            .form-container h2 {
                font-size: 20px;
            }

            .form-container label {
                font-size: 12px;
            }

            .form-container input, .form-container select {
                padding: 8px;
                font-size: 12px;
            }

            .form-container button {
                padding: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 500px) {
            .form-container {
                width: 68%;
                margin-left: 1.1rem;
                padding: 20px;
            }

            .form-container h2 {
                font-size: 18px;
            }

            .form-container input, .form-container select {
                font-size: 12px;
                padding: 6px;
            }

            .form-container button {
                padding: 6px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Mencari Karakter / Simbol</h2>
        <form method="POST">
            <label for="symbol">Masukkan Teks</label>
            <input type="text" id="symbol" name="symbol" required><br><br>
            <button type="submit">Cari</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p id="result">
                <b>Teks : <?= htmlspecialchars($str) ?></b><br>
                <?php if (!empty($simbol_terdeteksi)): ?>
                    Simbol yang terdapat pada kalimat: <?= implode(", ", $simbol_terdeteksi) ?>
                <?php else: ?>
                    Tidak terdapat simbol pada kalimat.
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
