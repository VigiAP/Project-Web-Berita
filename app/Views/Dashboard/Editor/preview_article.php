<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <h2>Judul</h2>
            <p class="text-muted">Tanggal Post</p>
            <img src="#" style="max-width: 100%; height: auto;">
            <br><br>
            <div>isi berita</div>
            <hr style="border: 1px solid white;">
        </div>
        <div class="card-footer">
                    <button type="" class="btn btn-primary">Approve</button>
                    <a href="<?= base_url('editor/preview'); ?>" class="btn btn-danger">Kembali</a>
                </div>
    </div>
</section>

<?= $this->endSection(); ?>