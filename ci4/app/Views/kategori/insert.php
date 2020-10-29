<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php 
    echo session()->getFlashdata('info');
?>

<h1> Insert Data</h1>

<form action="<?= base_url()?>/Admin/kategori/insert" method="post">

    kategori : <input type="text" name="kategori" required>
    <br>
    keterangan : <input type="text" name="keterangan" required>
    <br>
    <input type="submit" name="simpan" value="simpan">

</form>

<?= $this->endSection() ?>