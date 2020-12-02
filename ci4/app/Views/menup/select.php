<?= $this->extend('template/home') ?>

<?= $this->section('content2') ?>







    <div class="col-4">
    
        <form  action="<?= base_url('/Front/menup/read')?>" method="get">
            <?= view_cell('\App\Controllers\Front\Menup::option') ?>
        
        </form>
    
    </div>


    <div class="row">
        <div class="col">
            <h2><?= $judul; ?></h2>
            <hr>
            <?php foreach ($menu as $key) : ?>
            <div class="card" style="width: 14rem; float:left; margin:12px; ">
                    <img src="<?= base_url('upload/' . $key['gambar'] . '') ?>" class="card-img-top" style="height : 150px;" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['menu'] ?></h5>
                        <p class="card-text">Rp.<?= $key['harga'] ?></p>
                        <a href="<?= base_url('/Front/beli/index/' . $key['idmenu'] . '') ?>" class="btn btn-primary">Beli | 
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
      </svg></a>
                    </div>
                    </div>
                    <?php endforeach ?>
                    <div style="clear: both;">
                        <?= $pager->links('page', 'bootstrap') ?>
                    </div>
        </div>
    </div>










<?= $this->endSection() ?>