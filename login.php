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
                <h3 class="text-center">Login</h3>
                <form method="POST" action="proses_login.php">
                    Username: <input type="text" name="username" class="form-control"><br>
                    Password: <input type="password" name="password" class="form-control"><br>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>