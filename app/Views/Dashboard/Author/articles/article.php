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
                       <?php  $no = 1;?>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $article['title']; ?></td>
                            <td><?= $article['content']; ?></td>
                            <td><?= $article['publication_date']; ?></td>
                            <td>
                                <?php if($article['image']) {?>
                                    <img src="<?= base_url('img/')?>/<?= $article['image']; ?>" width="100px">
                                <?php }?>
                            </td>
                            <td>
                                    <a href="<?= base_url('/author/edit_article/' . $article['id_article']); ?>" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('/author/delete_article/' . $article['id_article']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="nav-icon fa fa-trash"></i> Delete</a>
                            </td>
                    <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>