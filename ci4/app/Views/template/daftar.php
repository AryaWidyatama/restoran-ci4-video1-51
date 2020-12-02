<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css')?>" >
    <title>Login Page</title>
</head>
<body>

<div class="container">

<div class="col">
<h3> Insert Data</h3>
</div>



<div class="col-7">
<form action="<?= base_url('/HomePage/Daftar/insert')?>" method="post">
<div class="form-group">
<label for="Kategori">Nama Pelanggan </label>
 <input type="text" name="pelanggan" required class="form-control">
    </div>

    <div class="form-group">
<label for="Kategori">Alamat</label>
 <input type="text" name="alamat" required class="form-control">
    </div>

    <div class="form-group">
<label for="Kategori">No.Telepon</label>
 <input type="text" name="telp" required class="form-control">
    </div>

    <div class="form-group">
    <label for="Keterangan">Email</label>
     <input type="email" name="email" required class="form-control">
    </div>
    <div class="form-group">
    <label for="Keterangan">Password</label>
     <input type="password" name="password" required class="form-control">
    </div>
   
    
    <div class="form-group">
    <input type="submit" name="simpan" value="simpan">
    </div>

</form>

</div>

</div>
    



</body>
</html>