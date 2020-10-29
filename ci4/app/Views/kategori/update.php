<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h1> Update Data</h1>

<form action="<?= base_url()?>/Admin/kategori/update" method="post">

    kategori : <input type="text" name="kategori" value="<?= $kategori['kategori']?>" required>
    <br>
    keterangan : <input type="text" name="keterangan" value="<?= $kategori['keterangan']?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">
    <input type="submit" name="simpan" value="simpan">

</form>

<?= $this->endSection() ?>