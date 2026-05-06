<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4 mt-5 shadow">
<h3>Transaksi</h3>

<form method="POST" action="proses_transaksi.php">

<!-- PILIH BARANG -->
<label>Barang</label>
<select name="barang_id" id="barang" class="form-control mb-3" onchange="setHarga()" required>
    <option value="">-- Pilih Barang --</option>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM barang");
    while ($data = mysqli_fetch_assoc($query)) {
        echo "<option value='{$data['id_barang']}' data-harga='{$data['harga']}'>
                {$data['nama_barang']} - Rp {$data['harga']}
              </option>";
    }
    ?>
</select>

<!-- HARGA -->
<label>Harga</label>
<input type="number" id="harga" name="harga" class="form-control mb-3" readonly>

<!-- JUMLAH -->
<label>Jumlah</label>
<input type="number" id="jumlah" name="jumlah" value="1" class="form-control mb-3">

<!-- DISKON -->
<label>Diskon (%)</label>
<input type="number" id="diskon" name="diskon" value="0" class="form-control mb-3">

<!-- BAYAR -->
<label>Bayar</label>
<input type="number" id="bayar" name="bayar" class="form-control mb-3">

<button class="btn btn-primary">Proses</button>

</form>

</div>
</div>
</div>
</div>

<script>
function setHarga() {
    let select = document.getElementById("barang");
    let harga = select.options[select.selectedIndex].dataset.harga;
    document.getElementById("harga").value = harga;
    hitung();
}

function hitung() {
    let harga = document.getElementById("harga").value || 0;
    let jumlah = document.getElementById("jumlah").value || 0;
    let diskon = document.getElementById("diskon").value || 0;
    let bayar = document.getElementById("bayar").value || 0;

    let subtotal = harga * jumlah;
    let potongan = (diskon / 100) * subtotal;
    let total = subtotal - potongan;
    let kembalian = bayar - total;
}

document.getElementById("jumlah").addEventListener("input", hitung);
document.getElementById("diskon").addEventListener("input", hitung);
document.getElementById("bayar").addEventListener("input", hitung);
</script>

</body>
</html>
