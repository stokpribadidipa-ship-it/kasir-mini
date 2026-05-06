<?php
include "koneksi.php";

function hitungDiskon($harga, $diskon) {
    $potongan = ($diskon / 100) * $harga;
    return $harga - $potongan;
}
 
// Fungsi hitung kembalian
function hitungKembalian($bayar, $total) {
    return $bayar - $total;
}

$id_barang = $_POST['barang_id'];

if (isset($_POST['harga'])) {
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $bayar = $_POST['bayar'];


    $total = hitungDiskon($harga, $diskon);
    $kembalian = hitungKembalian($bayar, $total);

    mysqli_query($conn, "INSERT INTO transaksi 
(id_barang, tanggal, total, bayar, kembalian) 
VALUES 
('$id_barang', NOW(), '$total', '$bayar', '$kembalian')");

    echo "Total: Rp $total <br>";
    echo "Kembalian: Rp $kembalian";
}
?>
