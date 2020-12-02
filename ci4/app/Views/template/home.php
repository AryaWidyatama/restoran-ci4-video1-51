<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css')?>" >
    <title>HomePage</title>
</head>
<body>

<div class="container">
<div class="row mt-2">
    <div class="col">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="col-md-3 mt-2" style="font-size:25px;" href="<?= base_url('/home') ?>">Restoran Makanan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

    <?php 
       if (!empty(session()->get('email'))) { ?>

     

       
      <li class="nav-item mt-2 ml-5">Email : </li>
      <li class="nav-item  mt-2 ml-2">
      <?php 
    
      if (!empty(session()->get('email'))) {
       echo session()->get('email');
      }
    ?>
      </li>

      <li class=" mt-2 ml-2 float-right ">
            <a class="btn btn-primary " href="<?= base_url('HomePage/History') ?>">History
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
      </svg></a>
      </li>

      <li class=" mt-2 ml-2 float-right">
      <a class="btn btn-danger" href="<?= base_url('Homepage/Login/logout') ?>">Logout</a>
      </li>

      

      <?php } ?> 
    
     
      <?php 
    
    if (empty(session()->get('email'))) { ?>
      <li class=" mt-2 ml-2 float-right ">
      <a class="btn btn-primary" href="<?= base_url('HomePage/Daftar/') ?>">Daftar</a>
      </li>

      <li class=" mt-2 ml-2 float-right ">
      <a class="btn btn-primary" href="<?= base_url('HomePage/Login/') ?>">Login</a>
      </li>
   <?php }?>
  

     
     
      
      
     
     
    

      
     
    </ul>
  </div>
</nav>
    
    </div>
</div>
  <div class="row mt-2">
  
    <div class="col-4"><div class="card" style="width: 18rem;">
    <h2 class="mt-3"style="margin:auto;">Kategori</h2>
    <hr>
    <?php if(!empty($kategori)){?>
            <ul class="nav flex-column ">
           
           
            <?php foreach ($kategori as $r): ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Front/HomePage/read/' . $r['idkategori'] . '') ?>"><?= $r['kategori']?></a></li>
                <?php endforeach?>
            <?php  }?>
            </ul>
</div></div>
    <div class="col-8 px-2">
    <?= $this->renderSection('content2') ?>
    </div>
  </div>
</div>
    



</body>
</html>
