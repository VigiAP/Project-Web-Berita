<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <form action="<?= base_url('author/update_category'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Nama</label>
                        <input type="hidden" name="id" class="form-control" value="<?=$category[0]['id_category']?>">
                        <input type="text" name="name" class="form-control" placeholder="Nama kategori ..."
                            value="<?=$category[0]['name']?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('author/category'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>