  <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                    <a href="<?= base_url('Home'); ?>" id="sidebar-nav" class="nav-link " style="border: 1px solid gray;">
                    <i class="fa-solid fa-gauge ml-1"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Accounts/profile'); ?>" id="sidebar-nav" class="nav-link" style="border: 1px solid gray;">
                    <i class="fa-solid fa-address-card ml-1"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <?php
                    switch (session()->get('jenisLog')) {
                        case 'admin':
                            echo $this->include('template/sidebarMenuAdmin');
                            break;
                        case 'editor':
                            echo $this->include('template/sidebarMenuEditor');
                            break;
                        case 'author':
                            echo $this->include('template/sidebarMenuAuthor');
                            break;
                        default:
                            "";
                            break;
                    }
                ?>
            </ul>
        </nav>