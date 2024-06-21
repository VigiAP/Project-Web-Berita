<?= $this->extend('/template/t_home_page'); ?>
<?= $this->section('konten'); ?>

<main id="content">
  <!-- advertisement -->
  <!-- block news -->
  <div class="bg-gray-50 py-6">
    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
      <div class="flex flex-row flex-wrap">
        <!-- full -->
        <div class="flex-shrink max-w-full w-full overflow-hidden">
          <div class="w-full py-3 mb-3">
            <h2 class="text-gray-800 text-3xl font-bold">
              <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> <?=$article[0]['title']?>
            </h2>
          </div>
          <div class="flex flex-row flex-wrap -mx-3">
            <div class="max-w-full w-full px-4">
              <!-- Post content -->
              <div class="leading-relaxed pb-4">
                <figure class="flex justify-center mb-6">
                  <img class="max-w-full h-auto" src="<?= base_url('img/')?>/<?= $article[0]['image']; ?>"
                    alt="Image description"> <!-- isi sama foto-->
                </figure>
                <p class="mb-5"><?=$article[0]['content']?></p>
                <!-- isi sama berita jika si gambar tidak bisa di tengah -->
                <blockquote
                  class="relative p-4 border-l-4 mt-3 border-red-700 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-40 mb-4 text-xl">
                  <span class="absolute opacity-80 w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-700" viewBox="0 0 270.000000 270.000000">
                      <g transform="translate(0.000000,270.000000) scale(0.100000,-0.100000)" fill="currentColor"
                        stroke="none">
                        <path
                          d="M920 2182 c-290 -124 -482 -341 -540 -610 -30 -140 -40 -296 -40 -644 l0 -328 370 0 370 0 0 370 0 370 -181 0 -181 0 7 63 c26 243 129 387 342 477 35 15 66 29 69 32 7 7 -132 298 -143 298 -4 0 -37 -13 -73 -28z">
                        </path>
                        <path
                          d="M2179 2186 c-249 -103 -442 -295 -520 -516 -50 -142 -61 -247 -66 -677 l-5 -393 371 0 371 0 0 370 0 370 -181 0 -181 0 7 53 c21 170 67 281 150 363 51 49 143 107 215 134 19 7 39 17 44 21 10 9 -124 298 -139 298 -5 0 -35 -10 -66 -23z">
                        </path>
                      </g>
                    </svg>
                  </span>
                  <p class="ml-16 mb-4"><?= getArticleTitle($randomArticleTitle);?></p>
                </blockquote>
                <div
                  class="relative flex flex-row items-center justify-between overflow-hidden bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20 mt-12 mb-2 px-6 py-2">
                  <div class="my-4 text-sm">
                    <!--author-->
                    <span class="mr-2 md:mr-4">
                      <!-- <i class="fas fa-user me-2"></i> -->
                      <svg class="bi bi-person mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z"
                          clip-rule="evenodd"></path>
                      </svg> by <a class="font-semibold" href="#"><?=$article[0]['name']?></a>
                    </span>
                    <!--date-->
                    <time class="mr-2 md:mr-4" datetime="2020-10-22 10:00">
                      <!-- <i class="fas fa-calendar me-2"></i> -->
                      <svg class="bi bi-calendar mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"
                          clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                          d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"
                          clip-rule="evenodd"></path>
                      </svg> <?=formatTanggal($article[0]['publication_date'])?>
                    </time>
                    <!--view-->
                    <span class="mr-2 md:mr-4">
                      <!-- <i class="fas fa-eye me-2"></i> -->
                      <svg class="bi bi-eye mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z"
                          clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                          d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z"
                          clip-rule="evenodd"></path>
                      </svg> <?=$getViewArticleById?>x Dilihat
                    </span>
                    <!-- like button -->
                    <button id="like" data-user-id="<?=session()->get('logged_in') ? session()->get('id') : false?>" data-article-id="<?=$article[0]['id_article']?>">
                      <i id="icon" class="fa-regular fa-heart blank">
                      </i>
                    </button>
                    <?=$getArticleLikesById?>x Disukai
                    <!--end view-->
                  </div>

                  <div class="hidden lg:block">
                    <ul class="space-x-3">
                      <!--facebook-->
                      <li class="inline-block">
                        <a target="_blank" class="hover:text-red-700" href="#" title="Share to Facebook">
                          <!-- <i class="fab fa-facebook fa-2x"></i> -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                            </path>
                          </svg>
                        </a>
                      </li>
                      <!--twitter-->
                      <li class="inline-block">
                        <a target="_blank" class="hover:text-red-700" href="#" title="Share to Twitter">
                          <!-- <i class="fab fa-twitter fa-2x"></i> -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                            </path>
                          </svg>
                        </a>
                      </li>
                      <!--instagram-->
                      <li class="inline-block">
                        <a target="_blank" class="hover:text-red-700" href="#" title="Share to Instagram">
                          <!-- <i class="fab fa-instagram fa-2x"></i> -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                            <path fill="currentColor"
                              d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z">
                            </path>
                            <path fill="currentColor"
                              d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                            <path fill="currentColor"
                              d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z">
                            </path>
                          </svg>
                        </a>
                      </li>
                      <!--end instagram-->
                    </ul>
                  </div>
                </div>
              </div>
    
              <!-- author -->
              <div class="flex flex-wrap flex-row -mx-4 justify-center py-4 items-center">
                <div class="flex-shrink max-w-full px-4">
                  <a href="#"><img class="rounded-full border max-w-full h-auto dark:border-gray-700"
                      src="<?= base_url('img/'); ?><?=$article[0]['user_image'];?>" alt="author" width="100"></a>
                </div>
                <div class="flex-shrink max-w-full px-4 w-3/4 sm:w-4/5 md:w-5/6">
                  <!--name-->
                  <p class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                    <span class="font-semibold"><?=$article[0]['name']?></span>
                  </p>
                </div>
              </div>
              <!-- Comments -->
              <div>
                <form class="w-full bg-white rounded-lg border p-2 mx-auto mt-10 my-10">
                  <div class="px-3 mb-2 mt-2">
                    <textarea placeholder="comment"
                      class="w-full bg-gray-100 rounded border border-gray-00 leading-normal resize-none h-20 py-2 px-3 font-medium  focus:outline-none focus:bg-white" id="comment"></textarea>
                  </div>
                  <div class="flex justify-end px-4">
                    <input type="submit"
                      class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500 transition duration-300 ease-in-out hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300"
                      value="Comment" id="tSubmit" data-user="<?=session()->get('logged_in') ? session()->get('id') : false ?>" data-article="<?=$article[0]['id_article']?>">
                  </div>
                </form>
              </div>

              <div id="container">
              </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<?= $this->endSection(); ?>