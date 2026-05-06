<?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-4 mt-5">
                     <h3>Tambah Barang</h3>
                    <form method="POST">
                        Nama: <input type="text" name="nama" class="form-control"><br>
                        Harga: <input type="number" name="harga" class="form-control"><br>
                        Stok: <input type="number" name="stok" class="form-control"><br>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include "koneksi.php";
if (isset($_POST['nama'])) {
    mysqli_query($conn, "INSERT INTO barang VALUES ('', '$_POST[nama]', '$_POST[harga]', '$_POST[stok]')");
}

?>
</body>
</html>
