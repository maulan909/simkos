        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?= base_url('assets/img/admin-avatar.png') ?>" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?= $this->session->userdata('nama') ?></div><small><?= $this->session->userdata('username') ?></small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <?php if (is_admin()) : ?>
                        <li>
                            <a <?php if ($judul_halaman == 'Dasbor') echo 'class="active"' ?> href="<?= base_url('dasbor') ?>"><i class="sidebar-item-icon fa fa-dashboard"></i>
                                <span class="nav-label">Dasbor</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($judul_halaman == 'Daftar User') echo 'class="active"' ?> <?php if ($username != 'superadmin') echo 'style="display: none"' ?> href="<?= base_url('daftar-user') ?>"><i class="sidebar-item-icon fa fa-user"></i>
                                <span class="nav-label">Daftar User</span>
                            </a>
                        </li>
                        <li class="heading">KAMAR</li>
                        <!-- <li>
                        <a <?php if ($judul_halaman == 'Pilih Kamar') echo 'class="active"' ?> href="<?= base_url('pilih-kamar') ?>"><i class="sidebar-item-icon fa fa-th"></i>
                        <span class="nav-label">Pilih Kamar</span>
                    </a>
                </li> -->
                        <li>
                            <a <?php if ($judul_halaman == 'Daftar Kamar') echo 'class="active"' ?> href="<?= base_url('daftar-kamar') ?>"><i class="sidebar-item-icon fa fa-th-list"></i>
                                <span class="nav-label">Daftar Kamar</span>
                            </a>
                        </li>
                        <!-- <li>
                <a <?php if ($judul_halaman == 'Daftar Harga Kamar') echo 'class="active"' ?> href="<?= base_url('daftar-harga') ?>"><i class="sidebar-item-icon fa fa-dollar"></i>
                <span class="nav-label">Daftar Harga Kamar</span>
            </a>
        </li> -->
                        <li class="heading">PENGHUNI</li>
                        <li>
                            <a <?php if ($judul_halaman == 'Daftar Akun Penghuni') echo 'class="active"' ?> href="<?= base_url('daftar-penghuni') ?>"><i class="sidebar-item-icon fa fa-user-circle"></i>
                                <span class="nav-label">Daftar Penghuni</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a <?php if ($judul_halaman == 'Daftar Eks-Penghuni') echo 'class="active"' ?> href="<?= base_url('daftar-ekspenghuni') ?>"><i class="sidebar-item-icon fa fa-window-close"></i>
                            <span class="nav-label">Daftar Eks-Penghuni</span>
                        </a>
                    </li> -->
                        <li class="heading">KEUANGAN</li>
                        <li>
                            <a <?php if ($judul_halaman == 'List Tagihan') echo 'class="active"' ?> href="<?= base_url('list-tagihan') ?>"><i class="sidebar-item-icon fa fa-tags"></i>
                                <span class="nav-label">List Tagihan</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($judul_halaman == 'Riwayat Pembayaran') echo 'class="active"' ?> href="<?= base_url('riwayat-pembayaran') ?>"><i class="sidebar-item-icon fa fa-history"></i>
                                <span class="nav-label">Riwayat Pembayaran</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!is_admin()) : ?>
                        <li class="heading">Kamar</li>
                        <li>
                            <a <?php if ($judul_halaman == 'Tagihan Penghuni') echo 'class="active"' ?> href="<?= base_url('tagihan-penghuni') ?>"><i class="sidebar-item-icon fa fa-sign-in"></i>
                                <span class="nav-label">List Kamar</span>
                            </a>
                        </li>
                        <li class="heading">Pembayaran</li>
                        <li>
                            <a <?php if ($judul_halaman == 'Tagihan Penghuni') echo 'class="active"' ?> href="<?= base_url('tagihan-penghuni') ?>"><i class="sidebar-item-icon fa fa-tag"></i>
                                <span class="nav-label">Tagihan Penghuni</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- <li>
                        <a <?php if ($judul_halaman == 'Laporan Keuangan') echo 'class="active"' ?> href="<?= base_url('laporan-keuangan') ?>"><i class="sidebar-item-icon fa fa-money"></i>
                            <span class="nav-label">Laporan Keuangan</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a <?php if ($judul_halaman == 'Laporan Piutang') echo 'class="active"' ?> href="<?= base_url('laporan_piutang') ?>"><i class="sidebar-item-icon fa fa-credit-card-alt"></i>
                            <span class="nav-label">Laporan Keuangan</span>
                        </a>
                    </li> -->

                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">