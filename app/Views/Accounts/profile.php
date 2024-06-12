<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<div class="container">
    <div class="main-body" style="padding: 50px;">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?= base_url('img/'); ?><?=session()->get('image');?>" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?=ucwords($user[0]['name'])?></h4>
                                <p class="text-secondary mb-1"><?=ucfirst($user[0]['role'])?></p>
                                <p class="text-muted font-size-sm"><?=$user[0]['phone_no']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=ucwords($user[0]['name'])?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=$user[0]['username']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=$user[0]['phone_no']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 <?=status($user[0]['status'])?>
                            </div>
                        </div>
                        <hr>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " href="<?= base_url('Accounts/edit_profile'); ?>">Edit Profile</a>
                                <a class="btn btn-success " href="<?= base_url('Accounts/change_password'); ?>">Ubah Password</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>