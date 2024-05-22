<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <h2><?= $article[0]['title'];?></h2>
            <p class="text-muted"><?=formatTanggal($article[0]['publication_date'])?></p>
            <img src="<?= base_url('img/')?>/<?= $article[0]['image']; ?>" style="max-width: 100%; height: auto;">
            <br><br>
            <div><?= $article[0]['content'];?></div>
            <hr style="border: 1px solid white;">
        </div>
        <div class="card-footer">
            <a href="<?= base_url('editor/aproveArticle/'.$article[0]['id_article']).'/yes'; ?>" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</a>
            <a href="<?= base_url('editor/aproveArticle/'.$article[0]['id_article']).'/not'; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Not Approve</a>
            <a href="<?= base_url('editor/preview'); ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>