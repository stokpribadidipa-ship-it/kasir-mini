<?php include "koneksi.php"; 
include "header.php";
?>

<div class="container py-4">
  <h5 class="mb-3">Data Transaksi</h5>
  <table class="table table-bordered table-striped">
    <thead class="table-primary">
      <tr>
        <th>#</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembalian</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = mysqli_query($conn, "SELECT * FROM transaksi");
      while ($d = mysqli_fetch_array($data)):
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td>Rp <?= number_format($d['total'], 0, ',', '.') ?></td>
        <td>Rp <?= number_format($d['bayar'], 0, ',', '.') ?></td>
        <td>Rp <?= number_format($d['kembalian'], 0, ',', '.') ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
