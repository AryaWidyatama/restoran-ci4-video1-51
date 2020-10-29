<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<a class="btn btn-primary" href="<?= base_url('/Admin/kategori/create') ?>" role="button">Tambah Data</a>



<h1> <?= $judul;?></h1>


<table class="table">

<tr>
    <th>No</th>
    <th>Kategori</th>
    <th>Keterangan</th>
    <th>Hapus</th>
    <th>Ubah</th>

</tr>
<?php $no=1 ?>
<?php foreach($kategori as $key => $value): ?>
<tr>

    <td><?= $no++ ?></td>
    <td><?= $value['kategori'] ?></td>
    <td><?= $value['keterangan'] ?></td>
    <td><a href="<?= base_url()?>/Admin/kategori/delete/<?= $value['idkategori']?>">Hapus</a></td>
    <td><a href="<?= base_url()?>/Admin/kategori/find/<?= $value['idkategori']?>">Ubah</a></td>

</tr>
<?php endforeach; ?>

</table>



<?= $pager->links('group1','bootstrap') ?>


<?= $this->endSection() ?>