<!DOCTYPE html>
<html data-theme="dracula" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">

   
</head>

<body>

    <!-- navbar -->
    <div class="navbar bg-base-300 ">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="">Beranda</a></li>
                    <li><a href="">Olahraga</a></li>
                    <li><a href="">Politik</a></li>
                    <li><a href="">Travel</a></li>
                    <li><a href="">Lainnya</a></li>
                    <li><a href="">Teknologi</a></li>
                    <li><a href="">Kesehatan</a></li>
                    <li><a href="">Bisnis</a></li>
                    <li><a href="">Musik</a></li>
                    <li><a href="">Fashion</a></li>
                    <li><a href="">Ilmu Pengetahuan</a></li>
                    <li><a href="">Item 3</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl " href="<?= base_url('/'); ?>">Pojok Berita</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <label class="input input-bordered flex items-center gap-60 mr-4">
                <input type="text" class="grow" placeholder="Search" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        </div>
        <div class="navbar-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar ">
                <div class="w-10 rounded-full">
                    <a href="<?= base_url('Accounts/'); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-13">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- navbar end -->
    </div>
    <div class="navbar bg-base-300 border-t-2 border-gray-300">
        <div class="navbar-start">
            <!-- Add your additional top navbar content here -->
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="<?= base_url('/'); ?>">Beranda</a></li>
                <li><a href="<?= base_url('/kategori/olahraga'); ?>">Olahraga</a></li>
                <li><a href="<?= base_url('/kategori/politik'); ?>">Politik</a></li>
                <li><a href="<?= base_url('/kategori/travel'); ?>">Travel</a></li>
                <li><a href="<?= base_url('/kategori/lainnya'); ?>">Lainnya</a></li>
                <li><a href="<?= base_url('/kategori/teknologi'); ?>">Teknologi</a></li>
                <li><a href="<?= base_url('/kategori/kesehatan'); ?>">Kesehatan</a></li>
                <li><a href="<?= base_url('/kategori/bisnis'); ?>">Bisnis</a></li>
                <li><a href="<?= base_url('/kategori/musik'); ?>">Musik</a></li>
                <li><a href="<?= base_url('/kategori/fashion'); ?>">Fashion</a></li>
                <li><a href="<?= base_url('/kategori/ilmu-pengetahuan'); ?>">Ilmu Pengetahuan</a></li>
                <li><a href="<?= base_url('/item3'); ?>">Item 3</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <!-- Add your additional top navbar content here -->
        </div>
    </div>


    <main class="my-3 mx-3">
        <div class="container">
            <?= $this->renderSection('konten'); ?>
        </div>
    </main>


</body>

</html>


</script>
</body>

</html>