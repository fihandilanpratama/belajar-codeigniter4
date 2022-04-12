<?= $this->extend('layouts/template'); ?>
<!-- file ini akan menggunakan file template (template.php) yang ada di folder layouts -->

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>ini adalah halaman home</h1>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>