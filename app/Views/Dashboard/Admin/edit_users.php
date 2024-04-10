<?= $this->extend('template/t_main'); ?>
<?= $this->section('konten'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <form action="<?= base_url('admin/update_user'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" class="form-control" placeholder="Username ..." value="<?= $user[0]['id_user']; ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username ..." value="<?= $user[0]['username']; ?>">
                </div>
                 <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name ..." value="<?= $user[0]['name']; ?>">
                </div>
                 <div class="form-group">
                    <label for="name">Nomor Hp</label>
                    <input type="text" name="phone_no" class="form-control" placeholder="Nomor Hp ..." value="<?= $user[0]['phone_no']; ?>">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <?php
                            switch ($user[0]['role']) {
                                case 'admin':
                                    $checkedAdmin = 'selected';
                                    break;
                                case 'editor':
                                    $checkedEditor = 'selected';
                                    case 'author':
                                $checkedAuthor = 'selected';
                            }
                    ?>
                    <select name="role" class="form-control">
                        <option value="admin" <?= $checkedAdmin ?? "" ?>>Admin</option>
                        <option value="author" <?= $checkedAuthor ?? "" ?>>Author</option>
                        <option value="editor" <?= $checkedEditor ?? "" ?>>Editor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <?php
                            switch ($user[0]['status']) {
                                case 'active':
                                    $checkedActive = 'selected';
                                    break;
                                case 'inactive':
                                    $checkedInactive = 'selected';
                            }
                    ?>
                    <select name="status" class="form-control">
                        <option value="active" <?= $checkedActive ?? "" ?>>Active</option>
                        <option value="inactive" <?= $checkedInactive ?? "" ?>>Inactive</option>
                    </select>
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