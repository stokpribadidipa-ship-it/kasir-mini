<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-body p-5 text-center">

                    <h2 class="mb-3">Dashboard Admin</h2>
                    <p class="text-muted mb-4">
                        Kelola data barang dan sistem kasir dengan mudah
                    </p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap">

                        <a href="barang.php" class="btn btn-primary px-4">
                            📦 Kelola Barang
                        </a>

                        <a href="tampil_barang.php" class="btn btn-outline-secondary px-4">
                            📋 Data Barang
                        </a>

                        <a href="tampil_transaksi.php" class="btn btn-success px-4">
                            💰 Riwayat Transaksi
                        </a>

                        <a href="logout.php" class="btn btn-danger px-4">
                            🚪 Logout
                        </a>

                    </div>

                </div>
            </div>

            <!-- Optional Info Card -->
            <div class="row mt-4 text-center">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5>Barang</h5>
                        <p class="text-muted">Kelola produk</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5>Transaksi</h5>
                        <p class="text-muted">Lihat penjualan</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5>Laporan</h5>
                        <p class="text-muted">Analisa data</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
