<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<?php if(session('validation')) {?>
<?php if(session('validation')->getErrors()) {?>
<?php $error = session('validation')->getErrors();?>
<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 text-center" role="alert">
    <?php foreach($error as $key => $value): ?>
    <p class="font-bold"><?= $value;?></p>
    <?php endforeach;?>
</div>
<?php }?>
<?php }?>
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
            <div class="col-lg-8">
                <form action="<?= base_url('Accounts/update_profile'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="id" class="form-control" value="<?=$user[0]['id_user']?>">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" value="<?=$user[0]['name']?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="username" class="form-control"
                                        value="<?=$user[0]['username']?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone_no" class="form-control"
                                        value="<?=$user[0]['phone_no']?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Photo</h6>
                                </div>
                                <div class="col-sm-9 input-group text-secondary">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="submit" name="button" class="btn btn-primary px-4">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>