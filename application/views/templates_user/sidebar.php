<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('user/dashboard') ?>">

                <div class="sidebar-brand-text mx-3">PENDAFTARAN PT/CV/LAIN</div>
                <!-- <br>Beran<br>Pendaftaran PT/CV/Lain -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider (buat garis)-->
            <!--<hr class="sidebar-divider"> -->

            <!-- Nav Item - Menu Utama -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class='fas fa-fw fa-pencil-alt'></i>
                    <span>Menu Utama</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('user/pendafCVPT') ?>">Pendaftaran CV/PT</a>
                        <a class="collapse-item" href="<?php echo base_url('user/SuratKuasa') ?>">Surat Kuasa Bayar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('user/lapPendafCVPT') ?>">Pendaftaran CV/PT 1</a>
                        <a class="collapse-item" href="<?php echo base_url('user/lapSuratKu') ?>">Pendaftaran Surat Kuasa 1</a>
                    </div>
                </div>
            </li>

            <!-- Divider (buat garis)-->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Nav Item - Daftar Notaris -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/daftarNotaris') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Daftar Notaris</span></a>
            </li>

            <!-- Nav Item - Audit Trail -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/AuditTrail') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Audit Trail</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('welcome/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class='fas fa-fw fa-sign-out-alt'></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-3 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4><b>PENGADILAN</b></h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?></span>
                                <i class='fas fa-user'></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('gantiPassword') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php base_url('welcome/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->