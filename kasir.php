<?php include 'koneksi.php'; 
include 'header.php';
?>

<div class="container mt-5">
<div class="card p-4 shadow">

<h3>Kasir</h3>

<form method="POST" action="transaksi.php">

<!-- Pilih Barang -->
<label>Barang</label>
<select name="barang_id" id="barang" class="form-control mb-3" onchange="setHarga()" required>
    <option value="">-- Pilih Barang --</option>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM barang");
    while ($data = mysqli_fetch_assoc($query)) {
        echo "<option value='{$data['id_barang']}' data-harga='{$data['harga']}'>
                {$data['nama_barang']} - {$data['harga']}
              </option>";
    }
    ?>
</select>

<!-- Harga -->
<label>Harga</label>
<input type="number" id="harga" name="harga" class="form-control mb-3" readonly>

<!-- Jumlah -->
<label>Jumlah</label>
<input type="number" id="jumlah" name="jumlah" class="form-control mb-3" value="1">


<!-- Bayar -->
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
    let bayar = document.getElementById("bayar").value || 0;

    let total = harga * jumlah;
    let kembalian = bayar - total;

    document.getElementById("total").innerText = total;
    document.getElementById("kembalian").innerText = kembalian;
}

document.getElementById("jumlah").addEventListener("input", hitung);
document.getElementById("bayar").addEventListener("input", hitung);
</script>

</body>
</html>
