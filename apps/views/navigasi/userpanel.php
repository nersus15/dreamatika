<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL . '/admin/dashboard' ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <img class="img-profile rounded-circle" src="<?= BASEURL . '/asset/logo/u.jpg' ?>" width="60" height="60">
            </div>
            <div class="sidebar-brand-text mx-3">Dreamatika team <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <?php foreach ($data['user_menu'] as $m) : ?>

            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <?Php
                $this->DB = new database;
                $menuId = $m['id'];
                $querySubmenu = "SELECT * FROM sub_menu where menu_id=$menuId and is_active=1";
                $this->DB->query($querySubmenu);
                $this->DB->execute();
                $subMenu = $this->DB->resultSet();
                ?>
            <?php foreach ($subMenu as $sm) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL . $sm['url'] ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>
                </li>

            <?php endforeach ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        <?php endforeach ?>
        <?php if ($data['account']['role_id'] == 1) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/user/log">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Log Aktivitas</span></a>
            </li>
        <?php elseif ($data['account']['role_id'] == 2) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/pengajar/log">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Log Aktivitas</span></a>
            </li>
        <?php endif ?>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="<?= BASEURL; ?>/akun/logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data['account']['nama']; ?></span>
                            <img class="img-profile rounded-circle" src="<?= BASEURL . '/asset/img/profile/' . $data['account']['image'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= BASEURL . '/user/profile' ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->