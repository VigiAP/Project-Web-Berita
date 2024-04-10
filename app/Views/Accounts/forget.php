<?= $this->extend('template/t_login_reg_forgot'); ?>
<?= $this->section('content'); ?>
    <div class="relative flex flex-col items-center justify-center h-screen overflow-hidden ">
        <div class="w-full  p-6 bg-base-300 border border-gray-400 rounded-xl shadow-md border-top lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-400">Forget Password</h1>
            <form class="space-y-4" method="post" action="<?=base_url('Accounts/forgetPassPost');?>">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" class="w-full input input-bordered" name="username"/>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Phone Number</span>
                    </label>
                    <input type="text" placeholder="Phone" class="w-full input input-bordered" name="phone_no"/>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-block border border-gray-400">Send Token</button>
                    <a href="<?= base_url('Accounts/'); ?>" class="btn btn-block border border-gray-400 mt-3">Back</a>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>

