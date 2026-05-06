<?php include "koneksi.php"; include 'header.php' ?>

<div class="container py-4">
  <div class="card shadow-sm border-0 rounded-3">

    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
      <h5 class="mb-0 fw-semibold">
        <i class="bi bi-box-seam text-primary me-2"></i> Data Barang
      </h5>
      <?php
        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM barang"));
      ?>
    </div>

    <div class="card-body p-0">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="ps-4 text-muted fw-medium" style="width:50px">No</th>
            <th class="text-muted fw-medium">Nama Barang</th>
            <th class="text-muted fw-medium">Harga</th>
            <th class="text-muted fw-medium text-center">Stok</th>
            <th class="text-muted fw-medium text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $data = mysqli_query($conn, "SELECT * FROM barang");
            $no = 1;
            while ($d = mysqli_fetch_array($data)):
              $stok = (int) $d['stok'];

              if ($stok === 0) {
                $badge = 'bg-danger-subtle text-danger';
                $label = 'Habis';
              } elseif ($stok <= 5) {
                $badge = 'bg-warning-subtle text-warning';
                $label = 'Sedikit · ' . $stok;
              } else {
                $badge = 'bg-success-subtle text-success';
                $label = $stok;
              }
          ?>
          <tr>
            <td class="ps-4 text-muted"><?= $no++ ?></td>
            <td class="fw-medium"><?= htmlspecialchars($d['nama_barang']) ?></td>
            <td class="text-success fw-medium">
              Rp <?= number_format($d['harga'], 0, ',', '.') ?>
            </td>
            <td class="text-center">
              <span class="badge <?= $badge ?> rounded-pill px-3 py-2">
                <?= $label ?>
              </span>
            </td>
            <td class="text-center">
              <a href="hapus_barang.php?id=<?= $d['id_barang'] ?>"
                 class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('Yakin ingin menghapus barang ini?')">
                <i class="bi bi-trash"></i> Hapus
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <div class="card-footer bg-white text-muted small py-2 px-4">
      Menampilkan semua data
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
