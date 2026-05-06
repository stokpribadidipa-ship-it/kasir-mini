<?php 
include "koneksi.php";
include "header.php";

// JOIN ke tabel barang
$data = mysqli_query($conn, "
    SELECT transaksi.*, barang.nama_barang 
    FROM transaksi 
    LEFT JOIN barang ON transaksi.id_barang = barang.id_barang
");

// cek error query
if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<div class="container py-4">
  <h4 class="mb-3">🧾 Data Transaksi</h4>

  <div class="card shadow">
    <div class="card-body">

      <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembalian</th>
            <th>Tanggal</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $no = 1;
          while ($d = mysqli_fetch_array($data)) :
          ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $d['nama_barang'] ?? '-' ?></td>
            <td class="text-end text-primary">
              Rp <?= number_format($d['total'], 0, ',', '.') ?>
            </td>
            <td class="text-end text-success">
              Rp <?= number_format($d['bayar'], 0, ',', '.') ?>
            </td>
            <td class="text-end text-danger">
              Rp <?= number_format($d['kembalian'], 0, ',', '.') ?>
            </td>
            <td class="text-center">
              <?= date('d-m-Y H:i', strtotime($d['tanggal'])) ?>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>

      </table>

    </div>
  </div>
</div>

</body>
</html>
