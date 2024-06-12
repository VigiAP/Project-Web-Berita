<div class="sidebar">
    
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('img/'); ?><?=session()->get('image');?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=ucwords(session()->get('jenisLog'))?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <?= $this->include('template/sidebarMenu') ?>
        <!-- /.sidebar-menu -->
    </div>