<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
        <h2 class="text-center my-3">Add Comic Data</h2>
        <form action="/comic/save" method="post">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
            </div>
            <div class="row mb-3">
                <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="penerbit" name="penerbit">
                </div>
            </div>
            <div class="row mb-3">
                <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="sampul" name="sampul">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="add">add data</button>
        </form>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>