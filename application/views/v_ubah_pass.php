<body>
    <div class="bg-login"></div>
    <div class="content changepass-parent">
        <form id="changepass-form" action="<?= base_url('ubah-pass') ?>" method="post" novalidate="novalidate">
            <div class="changepass-title">
                <!-- <img src="<?= base_url('assets/img/home.png') ?>" alt="Kos" style="width: 175px; vertical-align: middle"> -->
                <h2 class="changepass-title1">Ubah Password Admin</h2>
            </div>
            <div class="social-auth-hr">
                <span>Mengubah password akun <?= "<strong>$user->username</strong>" ?></span>
            </div>
            <input class="form-control" type="hidden" name="id" value="<?= $user->id ?>">
            <div class="form-group">
                <input class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" type="password" name="password" placeholder="Password Lama">
                <div class="invalid-feedback">
                    <?= form_error('password'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control <?= form_error('password_baru') ? 'is-invalid' : ''; ?>" type="password" name="password_baru" id="password_baru" placeholder="Password Baru">
                <div class="invalid-feedback">
                    <?= form_error('password_baru'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control <?= form_error('konfirmasi_password_baru') ? 'is-invalid' : ''; ?>" type="password" name="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru">
                <div class="invalid-feedback">
                    <?= form_error('konfirmasi_password_baru'); ?>
                </div>
            </div>
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-<?= $this->session->flashdata('type'); ?>"><?= $this->session->flashdata('message'); ?></div>
            <?php endif; ?>
            <?php if ($pesan == 'gagal_ubah_pass') echo '<div class="alert alert-danger">Password lama tidak benar.</div>' ?>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="btn btn-outline-primary btn-block" href="<?= base_url('dasbor'); ?>" onclick="window.history.back()"><strong>Kembali</strong></a>
                    </div>
                </div>
                <div class="col-4">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit"><strong>Submit</strong></button>
                    </div>
                </div>
            </div>
        </form>
    </div>