<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="reg-section">
            <h4 align="center" class="mt-2">Register </h4>
            <div class="row-md-12 d-flex justify-content-center shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <form method="post" action="../action/actionregister.php">
                    <div class="col-md-12 mt-5 mb-3">
                        <label for="Username" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="Username" />
                    </div>
                    

                    <div class="col-md-12 mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="Password" class="form-control" name="Password" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="Email" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="NamaLengkap" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="Alamat" />
                    </div>
      
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary">Daftar Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>