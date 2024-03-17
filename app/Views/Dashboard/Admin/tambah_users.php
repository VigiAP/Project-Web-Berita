<?= $this->extend('template/t_main'); ?>
<?= $this->section('konten'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <form action="<?= base_url('admin/save_user'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username ..." value="<?= old('username'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name ..." value="<?= old('name'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">Nomor Hp</label>
                    <input type="text" name="phone_no" class="form-control" placeholder="Nomor Hp ..." value="<?= old('phone_no'); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password ..." value="<?= old('password'); ?>">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="author">Author</option>
                        <option value="editor">Editor</option>
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