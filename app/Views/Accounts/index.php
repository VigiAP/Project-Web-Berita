<!DOCTYPE html>
<html data-theme="night" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>

<body>

    <div class="relative flex flex-col items-center justify-center h-screen overflow-hidden ">
        <div class="w-full  p-6 bg-base-300 border border-gray-400 rounded-xl shadow-md border-top lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-400">Login</h1>
            <form class="space-y-4">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" class="w-full input input-bordered" />
                </div>
                <div>
                    <label class="label -mt-2">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Enter Password" class="w-full input input-bordered" />
                </div>
                <div class="flex justify-between">
                    <a href="<?= base_url('Accounts/forget'); ?>" class="text-xs text-gray-500 hover:underline hover:text-blue-600">Forget Password?</a>
                    <a href="<?= base_url('Accounts/register'); ?>" class="text-xs text-gray-500 hover:underline hover:text-blue-600">Register</a>
                </div>
                <div class="">
                    <button class="btn btn-block border border-gray-400">Login</button>
                    <a href="<?= base_url('Home/'); ?>" class="btn btn-block border border-gray-400 mt-3">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>