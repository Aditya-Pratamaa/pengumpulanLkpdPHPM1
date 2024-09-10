<?php
$jurusan = ["PPLG", "HTL", "KLN", "PMN", "pplg", "htl"];
$jurusanBaru = array_unique(array_map('strtoupper', $jurusan));
print_r($jurusanBaru);
?>
