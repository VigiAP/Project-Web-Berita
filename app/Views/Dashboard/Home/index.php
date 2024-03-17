<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <h1></h1>SELAMAT DATANG DI HALAMAN <?=ucwords(session()->get('name'))?></h1>
        </div>
    </div><!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>