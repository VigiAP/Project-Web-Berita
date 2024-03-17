<?= $this->extend('template/t_main'); ?>
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
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Nomor Hp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no = 1;?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td><?= $user['phone_no']; ?></td>
                            <td><?= $user['status']; ?></td>
                            <td>
                                    <a href="<?= base_url('/admin/edit_user/' . $user['user_id']); ?>" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('/admin/delete_user/' . $user['user_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="nav-icon fa fa-trash"></i> Delete</a>
                            </td>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>