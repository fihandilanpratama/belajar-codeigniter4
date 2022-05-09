<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center mt-2 mb-2">Comics List</h2>
            <a href="/comic/create" class="btn btn-primary mb-3">Add a Comic Data</a>

            <!-- jika ada flash data -->
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">sampul</th>
                        <th scope="col">nama</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($comics as $comic) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td>
                                <img src="/img/<?= $comic['sampul']; ?>" alt="" class="sampul">
                            </td>
                            <td><?= $comic['name']; ?></td>
                            <td>
                                <a href="/comic/<?= $comic['slug']; ?>" class="btn btn-sm btn-success">detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>