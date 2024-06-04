<?= $this->extend('/template/t_home_page'); ?>
<?= $this->section('konten'); ?>
  
  <!-- =========={ MAIN }==========  -->
  <main id="content">

    <!-- slider news -->
    <div class="relative bg-gray-50" style="background-image: url("<? base_url('src/img/bg.jpg')?>");background-size: cover;background-position: center center;background-attachment: fixed">
      <div class="bg-black bg-opacity-70">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
          <div class="flex flex-row flex-wrap">
            <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
              <div class="w-full py-3">
                <h2 class="text-white text-2xl font-bold text-shadow-black">
                  <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Politik
                </h2>
              </div>
              <div id="post-carousel" class="post-carousel splide">
                <div class="splide__track">
                  <ul class="splide__list">
                    <?php foreach($artilcesSelectedByCategory as $article): ?>
                      <li class="splide__slide">
                        <div class="w-full pb-3">
                          <div class="hover-img bg-white">
                            <a href="">
                              <img class="max-w-full w-full mx-auto" src="<?= base_url('img/')?>/<?= $article['image']; ?>" alt="alt title">
                            </a>
                            <div class="py-3 px-6">
                              <h3 class="text-lg font-bold leading-tight mb-2">
                                <a href="<?=base_url('Home/singlePost')?>/<?=$article['id_article']?>"><?=$article['title']?></a>
                              </h3>
                              <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Indonesia</a>
                            </div>
                          </div>
                        </div>
                      </li>   
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- block news -->
    <div class="bg-white py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <div class="flex-shrink max-w-full w-full overflow-hidden">
            <div class="w-full py-3">
              <h2 class="text-gray-800 text-2xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Indonesia
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
               <?php foreach($articles as $article): ?>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                  <div class="flex flex-row sm:block hover-img">
                    <a href="">
                      <img class="max-w-full w-full mx-auto" src="<?= base_url('img/')?>/<?= $article['image']; ?>" alt="alt title">
                    </a>
                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                      <h3 class="text-lg font-bold leading-tight mb-2">
                        <a href="#"><?=$article['title']?></a>
                      </h3>
                      <p class="hidden md:block text-gray-600 leading-tight mb-1"><?=substr(strip_tags($article['content']), 0, 100). "...";?></p>
                      <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Kategori</a>
                    </div>
                  </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- block news -->
    <div class="bg-gray-50 py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <!-- Left -->
          <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
            <div class="w-full py-3">
              <h2 class="text-gray-800 text-2xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Olahraga
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
              <div class="flex-shrink max-w-full w-full px-3 pb-5">
                <div class="relative hover-img max-h-98 overflow-hidden">
                  <!--thumbnail-->
                  <a href="#">
                    <img class="max-w-full w-full mx-auto h-auto" src="<?= base_url('src/img/dummy/img2.jpg'); ?>"  alt="Image description">
                  </a>
                  <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                    <!--title-->
                    <a href="#">
                      <h2 class="text-3xl font-bold capitalize text-white mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, earum?</h2>
                    </a>
                    <p class="text-gray-100 hidden sm:inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptas omnis cumque non fugit ducimus! This very helpfull for generate default content..</p>                                                  
                    <!-- author and date -->
                    <div class="pt-2">
                      <div class="text-gray-100"><div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Indonesia</div>
                    </div>
                  </div>
                </div>
              </div>
            <?php foreach($artilcesSelectedByCategory2 as $article): ?>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="<?= base_url('img/')?>/<?= $article['image']; ?>" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#"><?=$article['title'];?></a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1"><?=substr(strip_tags($article['content']), 100, 100). "...";?></p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Indonesia</a>
                  </div>
                </div>
              </div>
            <?php endforeach;?>
            </div>
          </div>
          <!-- right -->
          <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
            <div class="w-full bg-white">
              <div class="mb-6">
                <div class="p-4 bg-gray-100">
                  <h2 class="text-lg font-bold">Most Popular</h2>
                </div>
                <ul class="post-number">
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, nam?</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, pariatur?</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, cumque.</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A, quam.</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, eum?</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>    
          </div>
        </div>
      </div>
    </div>
     <!-- block news -->
    <div class="bg-white py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <div class="flex-shrink max-w-full w-full overflow-hidden">
            <div class="w-full py-3">
              <h2 class="text-gray-800 text-2xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Teknologi
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
               <?php foreach($artilcesSelectedByCategory3 as $article): ?>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                  <div class="flex flex-row sm:block hover-img">
                    <a href="">
                      <img class="max-w-full w-full mx-auto" src="<?= base_url('img/')?>/<?= $article['image']; ?>" alt="alt title">
                    </a>
                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                      <h3 class="text-lg font-bold leading-tight mb-2">
                        <a href="#"><?=$article['title']?></a>
                      </h3>
                      <p class="hidden md:block text-gray-600 leading-tight mb-1"><?=substr(strip_tags($article['content']), 0, 100). "...";?></p>
                      <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Kategori</a>
                    </div>
                  </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main><!-- end main -->


<?= $this->endSection(); ?>