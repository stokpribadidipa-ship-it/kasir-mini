<?php
include "koneksi.php";

function hitungDiskon($harga, $diskon) {
    $potongan = ($diskon / 100) * $harga;
    return $harga - $potongan;
}

function hitungKembalian($bayar, $total) {
    return $bayar - $total;
}

if (isset($_POST['harga'])) {

    $barang_id = $_POST['barang_id'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $diskon = $_POST['diskon'];
    $bayar = $_POST['bayar'];

    $subtotal = $harga * $jumlah;
    $total = hitungDiskon($subtotal, $diskon);
    $kembalian = hitungKembalian($bayar, $total);

    mysqli_query($conn, "INSERT INTO transaksi 
    (barang_id, tanggal, total, bayar, kembalian) 
    VALUES 
    ('$barang_id', NOW(), '$total', '$bayar', '$kembalian')");

    echo "Total: Rp $total <br>";
    echo "Kembalian: Rp $kembalian";
}
?>
