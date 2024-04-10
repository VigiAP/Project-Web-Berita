<?= $this->extend('template/t_login_reg_forgot'); ?>
<?= $this->section('content'); ?>
    <div class="relative flex flex-col items-center justify-center h-screen overflow-hidden ">
        <div class="w-full  p-6 bg-base-300 border border-gray-400 rounded-xl shadow-md border-top lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-400">Register</h1>
            <form class="space-y-5" action="<?=base_url('Accounts/registerPost')?>" method="post">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Phone Number</span>
                    </label>
                    <input type="text" placeholder="Phone Number" class="w-full input input-bordered"  name="phone_no" value="<?= old('phone_no');?>"/>
                </div>
                <div>
                    <label class="label -mt-2">
                        <span class="text-base label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" class="w-full input input-bordered" name="username" value="<?= old('username');?>"/>
                </div>
                <div>
                    <label class="label -mt-2">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" class="w-full input input-bordered" name="password" />
                </div>
                <div class="mt-5">
                    <button class="btn btn-block border border-gray-400">Register</button>
                    <a href="<?= base_url('Accounts/'); ?>" class="mt-3 btn btn-block border border-gray-400">Back</a>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>