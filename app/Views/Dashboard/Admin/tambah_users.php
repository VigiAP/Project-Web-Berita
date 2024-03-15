<?= $this->extend('template/t_admin'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">

            <form action="<?= base_url('admin/simpan_users'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_users">Nama</label>
                        <input type="text" name="nama_users" class="form-control" placeholder="Judul ..." value="<?= old('nama_users'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Judul ..." value="<?= old('no_hp'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Judul ..." value="<?= old('Password'); ?>">
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('admin/users'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>