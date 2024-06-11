<?= $this->extend('/template/t_home_page'); ?>
<?= $this->section('konten'); ?>

<main id="content">

<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Categories</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            <?php foreach($categories as $category): ?>
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <h2 class="font-semibold text-md text-gray-700"><?=$category['name']?></h2>
                    <a href="<?=base_url('Home/category/')?><?=$category['name']?>" class="text-indigo-600 hover:text-indigo-800">Explore</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</main>

<?= $this->endSection(); ?>

