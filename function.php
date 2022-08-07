<?php

//function to count total ticket price
function counts($n_normal, $n_lansia, $harga)
{
    $hitung_normal = $n_normal * $harga;
    $banyak_diskon = $harga * 0.1;
    $hitung_lansia = $n_lansia * ($harga - $banyak_diskon);
    return $hitung_normal + $hitung_lansia;
}

//function to check the price of a ticket price
function price($id_kelas)
{
    include 'database.php';
    while ($row = $kelas->fetch_assoc()) {
        if ($row['id'] == $id_kelas) {
            return $row['harga'];
        }
    }
}
