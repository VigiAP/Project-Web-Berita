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
            <h1 class="text-3xl font-semibold text-center text-gray-400">Forget Password</h1>
            <form class="space-y-4">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Phone Number</span>
                    </label>
                    <input type="text" placeholder="Phone" class="w-full input input-bordered" />
                </div>
                <div class="">
                    <button class="btn btn-block border border-gray-400">Send Token</button>
                    <a href="<?= base_url('Accounts/'); ?>" class="btn btn-block border border-gray-400 mt-3">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>