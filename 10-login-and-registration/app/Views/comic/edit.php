<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center my-3">Edit Comic Data</h2>

            <form action="/comic/update/<?= $comic['id_comic'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $comic['slug'] ?>">

                <input type="hidden" name="oldSampul" value="<?= $comic['sampul'] ?>">

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" name="name" autofocus value="<?= (old('name')) ? old('name') : $comic['name'] ?>">

                        <!-- pesan dibawah akan muncul jika ada class is-invalid (diatas) jika tidak maka pesan dibawah tidak akan muncul. (telah diatur oleh bootsrap) -->
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                    <div class="col-sm-10">
                        <!-- value="old('nameField')" untuk mengambil inputan sebelumnya saat form disubmit atau direfresh sehingga user tidak perlu tulis ulang -->
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $comic['penulis'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $comic['penerbit'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $comic['sampul'] ?>" alt="" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ?>" name="sampul" id="sampul" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="input-group-text" class="sampul-name" for="sampul">pilih gambar</label>
                        </div>
                        <!-- <input type="text" class="form-control" id="sampul" name="sampul" value="<?= old('sampul') ?>"> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="add">edit data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>