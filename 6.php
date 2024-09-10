<?php

    $barang = [
        [
            'harga_barang' => 18000,
            'nama_barang' => 'Pasta Gigi',
            'Jumlah_beli' => 1,
            
        ],
        [
            'nama_barang' => 'Sabun Mandi',
            'harga_barang' => 5000,
            'Jumlah_beli' => 3,
            
        ],
        [
            'nama_barang' => 'Aloe Vera Sheet Mask',
            'harga_barang' => 15000,
            'Jumlah_beli' => 4,
            
        ],
    ];

    echo "Daftar Belanjaan : " . "<br>" . "<br>";
    $hargaSeluruh = 0;
    foreach ($barang as $item){
        $total = $item['harga_barang'] * $item['Jumlah_beli'];
        $hargaSeluruh += $total;
        
        echo $item['nama_barang']. "(" . $item['Jumlah_beli'] . ") "  . "<b>" .   "Rp " . number_format($total, 0, ',', '.'). "</b>" . "<br>";
        
        
    }
    echo  "Total yang harus dibayar adalah : ". "<b>" . "Rp " .number_format($hargaSeluruh, 0, ',', '.') ."<b/>";