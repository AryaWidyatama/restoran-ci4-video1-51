<?= $this->extend('template/home') ?>

<?= $this->section('content2') ?>

<?php 

    if (isset($_GET['page'])) {
       $page = $_GET['page'];
       $jumlah = 3;

       $no = ($jumlah * $page) - $jumlah+1;
    }else{
        $no = 1;
    }

?>

<div class="row">



<div class="col">

<h3> <?= $judul;?></h3>
</div>


</div>






<div class="row mt-2">

<div class="col">

<table class="table">

<tr>
    <th>No</th>
    <th>menu</th>
    <th>Foto</th>
    <th>Harga</th>
    <th>Aksi</th>
    <th>Total</th>
  

</tr>


<?php $no ?>

<?php foreach($menu as $key => $value ) {
    foreach ($value as $k) {?>
<tr>



    <td><?= $no++ ?></td>
   
    <td><?= $k['menu'] ?></td>
    <td><img style="width:70px;"src="<?=base_url('/upload/'. $k['gambar'].''); ?>" alt=""></td>
    <td><?= number_format($k['harga'])  ?></td>
    <td><a href="<?= base_url()?>/Front/menup/tambah/<?= $k['idmenu']?>"> [+]</a>&nbsp;
    &nbsp;<?= $jumlah[$key] ?>&nbsp;&nbsp;<a href="<?= base_url()?>/Front/menup/kurang/<?= $k['idmenu']?>"> [-]</a></td>
    <td><?= $jumlah[$key] * $k['harga'] ?></td>
    <?php $total = $total + ($jumlah[$key] * $k['harga']); ?>
    
</tr>



    <?php }
    }?>

<tr>

    <td colspan="4"><h3>Total Keseluruhan</h3></td>
    <td><h3><?= $total ?></h3></td>
</tr>

<tr>
<?php if($total > 0) :?>
    <td colspan="4"> <a class="btn btn-primary" href="<?= base_url('Front/beli/checkout/'.$total) ?>">Checkout</a></td>
<?php endif?>
</tr>


</table>






</div>

</div>


<?= $this->endSection() ?>