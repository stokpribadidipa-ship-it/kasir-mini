<?php include 'koneksi.php';
include 'header.php';
?>


<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4 mt-5 shadow">
<h3>Transaksi</h3>

<form method="POST" action="proses_transaksi.php">

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

<hr>

<h5>Preview</h5>
<p>Total: <span id="total">0</span></p>
<p>Kembalian: <span id="kembalian">0</span></p>

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
    let harga = parseFloat(document.getElementById("harga").value) || 0;
    let jumlah = parseFloat(document.getElementById("jumlah").value) || 0;
    let diskon = parseFloat(document.getElementById("diskon").value) || 0;
    let bayar = parseFloat(document.getElementById("bayar").value) || 0;

    let subtotal = harga * jumlah;
    let potongan = (diskon / 100) * subtotal;
    let total = subtotal - potongan;
    let kembalian = bayar - total;

    document.getElementById("total").innerText = total;
    document.getElementById("kembalian").innerText = kembalian;
}

document.getElementById("jumlah").addEventListener("input", hitung);
document.getElementById("diskon").addEventListener("input", hitung);
document.getElementById("bayar").addEventListener("input", hitung);
</script>

</body>
</html>
