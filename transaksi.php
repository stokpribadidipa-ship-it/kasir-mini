<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-4 mt-5">
                    <h2 class="card-title">Transaksi</h2>
                   <form method="POST" action="proses_transaksi.php">
                        Harga: <input type="number" name="harga" class="form-control"><br>
                        Diskon (%): <input type="number" name="diskon" class="form-control"><br>
                        Bayar: <input type="number" name="bayar" class="form-control"><br>
                        <button type="submit">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>