<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div class="mt-2">
                <a href="<?= base_url('/author/tambah_article'); ?>" class="btn btn-info"><i class="nav-icon fa fa-plus"></i> Tambah Berita</a>
            </div>
            <div class="mt-2">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>

                </table>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>