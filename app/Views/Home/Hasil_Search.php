<?= $this->extend('/template/t_home_page'); ?>
<?= $this->section('konten'); ?>

<main id="content">
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-col lg:flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3">
                            <div class="w-full py-3 mb-4">
                                <h2 class="text-gray-800 text-3xl font-bold">
                                    <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> Search result for: <b>"<?= $query ?>"</b>
                                </h2>
                            </div>
                        </div>
                        <?php if (empty($articles)): ?>
                            <p>No articles found.</p>
                        <?php else: ?>
                            <?php foreach ($articles as $article): ?>
                                <div class="flex-shrink max-w-full w-full sm:w-1/2 md:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                    <div class="flex flex-row sm:block hover-img">
                                        <a href="<?= base_url('Home/singlePost/' . $article['id_article']); ?>">
                                            <img class="max-w-full w-full mx-auto" src="<?= base_url('img/' . $article['image']); ?>" alt="<?= $article['title']; ?>">
                                        </a>
                                        <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                            <h3 class="text-lg font-bold leading-tight mb-2">
                                                <a href="<?= base_url('Home/singlePost/' . $article['id_article']); ?>"><?= $article['title']; ?></a>
                                            </h3>
                                            <p class="hidden md:block text-gray-600 leading-tight mb-1"><?= limit_words($article['content'], 20); ?></p>
                                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span><?= $article['publication_date']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>