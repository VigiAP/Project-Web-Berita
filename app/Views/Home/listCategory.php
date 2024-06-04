<?= $this->extend('/template/t_home_page'); ?>
<?= $this->section('konten'); ?>

<main id="content">

<div class="bg-gray-100 py-6">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Categories</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Technology</h2>
                <p class="text-gray-600">Latest updates and news about technology.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Health</h2>
                <p class="text-gray-600">Advice and information on health and wellness.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Finance</h2>
                <p class="text-gray-600">Tips and news on managing your finances.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Sports</h2>
                <p class="text-gray-600">Latest sports news and updates.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Entertainment</h2>
                <p class="text-gray-600">News about the entertainment industry.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="font-semibold text-lg text-gray-700">Travel</h2>
                <p class="text-gray-600">Get the latest travel news and tips.</p>
                <a href="#" class="text-indigo-600 hover:text-indigo-800">Explore</a>
            </div>
        </div>
    </div>
</div>

</main>

<?= $this->endSection(); ?>

