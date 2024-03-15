<?= $this->extend('template/t_admin'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div class="mt-2">
                <a href="<?= base_url('/admin/tambah_users'); ?>" class="btn btn-info"><i class="nav-icon fa fa-plus"></i> Tambah Users</a>
            </div>
            <div class="mt-2">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NO HP</th>
                            <th>Password</th>
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