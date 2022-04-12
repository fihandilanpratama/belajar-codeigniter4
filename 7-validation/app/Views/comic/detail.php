<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Detail Comic</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['name']; ?></h5>
                            <p class="card-text"><b>penulis : </b> <?= $comic['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>penerbit </b> : <?= $comic['penerbit']; ?></small></p>

                            <a href="" class="btn btn-sm btn-warning">edit</a>
                            <a href="" class="btn btn-sm btn-danger">delete</a>
                            <br><br>
                            <a href="/comic">back to comics list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>