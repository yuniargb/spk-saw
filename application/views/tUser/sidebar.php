<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <!-- <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">Steave Jobs <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">varun@gmail.com</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- End User Profile-->
                </li>
                <!-- <li class="p-15 m-t-10"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a></li> -->
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Dashboard' ? 'active' : '' ?>" href="<?= base_url('index.php/dashboard') ?>" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <?php
                if ($this->session->userdata('status') == "login_admin") { ?>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Karyawan' ? 'active' : '' ?>" href="<?= base_url('index.php/karyawan') ?>" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Karyawan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Kriteria' ? 'active' : '' ?>" href="<?= base_url('index.php/kriteria') ?>" aria-expanded="false">
                        <i class="mdi mdi-border-all"></i>
                        <span class="hide-menu">Kriteria</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Absensi' ? 'active' : '' ?>" href="<?= base_url('index.php/absensi') ?>" aria-expanded="false">
                        <i class="mdi mdi-book"></i>
                        <span class="hide-menu">Absensi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Penlilaian' ? 'active' : '' ?>" href="<?= base_url('index.php/penilaian') ?>" aria-expanded="false">
                        <i class="mdi mdi-face"></i>
                        <span class="hide-menu">Penilaian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $hal == 'Hasil' ? 'active' : '' ?>" href="<?= base_url('index.php/hasil') ?>" aria-expanded="false">
                        <i class="mdi mdi-file-chart"></i>
                        <span class="hide-menu">Hasil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?php $hal == 'Laporan' ? 'active' : '' ?>" href="<?= base_url('index.php/laporan') ?>" aria-expanded="false">
                        <i class="mdi mdi-chart-histogram"></i>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                <?php } ?>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>