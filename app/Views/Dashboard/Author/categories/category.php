<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div class="mt-2">
                <a href="<?= base_url('/author/add_category'); ?>" class="btn btn-info"><i class="nav-icon fa fa-plus"></i> Tambah Kategori</a>
            </div>
            <div class="mt-2">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php  $no = 1;?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $category['name']; ?></td>
                            <td>
                                    <a href="<?= base_url('/author/edit_category/' . $category['id_category']); ?>" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('/author/delete_category/' . $category['id_category']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="nav-icon fa fa-trash"></i> Delete</a>
                            </td>
                    <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>