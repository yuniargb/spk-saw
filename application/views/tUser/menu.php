<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand uppercase text-center" href="<?= base_url('index.php/dashboard') ?>">
                ZINKPOWER AUSTRINDO
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        asds
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Edit Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-out m-r-5 m-l-5"></i> Logout</a>
                    </div>
                </li> -->
                <?php
                if ($this->session->userdata('status') == "login_admin") { ?>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="<?= base_url('index.php/dashboard/logout') ?>">
                        Logout
                    </a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="<?= base_url('index.php/dashboard/login') ?>">
                        Login
                    </a>
                </li>
                <?php } ?>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>