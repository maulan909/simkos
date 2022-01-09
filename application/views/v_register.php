<body>
    <div class="bg-login"></div>
    <div class="content login-parent">
        <form id="login-form" action="<?= base_url('register') ?>" method="post">
            <div class="login-title">
                <img src="<?= base_url('assets/img/home.png') ?>" alt="Kos" style="width: 120px; vertical-align: middle;">
                <h2 class="login-title1">Sistem Informasi</h2>
                <h2 class="login-title1">Indekos Ibu Ida</h2>
            </div>
            <div class="social-auth-hr">
                <span>Silakan isi data diri.</span>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group-icon left">
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <input class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" type="text" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group-icon left">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" type="password" name="password" id="password" placeholder="Password">
                    <div class="invalid-feedback">
                        <?= form_error('password'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-group-icon left">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control <?= form_error('confirm_password') ? 'is-invalid' : ''; ?>" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <div class="invalid-feedback">
                        <?= form_error('confirm_password'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="input-group-icon left">
                    <div class="input-icon"><i class="fa fa-user-circle-o"></i></div>
                    <input class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" type="text" name="name" id="name" placeholder="Full Name" autocomplete="off" value="<?= set_value('name'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('name'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nik">Nomor Induk Kependudukan</label>
                <div class="input-group-icon left">
                    <div class="input-icon"><i class="fa fa-address-card"></i></div>
                    <input class="form-control <?= form_error('nik') ? 'is-invalid' : ''; ?>" type="number" name="nik" id="nik" placeholder="NIK" autocomplete="off" value="<?= set_value('nik'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nik'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <div class="input-group-icon left">
                    <div class="input-icon ml-2"><i class="fa fa-phone"></i> 62</div>
                    <input class="form-control pl-5 <?= form_error('telepon') ? 'is-invalid' : ''; ?>" type="number" name="telepon" id="telepon" autocomplete="off" value="<?= set_value('telepon'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('telepon'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control  <?= form_error('alamat') ? 'is-invalid' : ''; ?>"><?= set_value('alamat'); ?></textarea>
                <div class="invalid-feedback">
                    <?= form_error('alamat'); ?>
                </div>
            </div>
            <!-- <div class="form-group d-flex justify-content-between">
                    <label class="ui-checkbox ui-checkbox-info">
                        <input type="checkbox">
                        <span class="input-span"></span>Ingat saya</label>
                </div> -->
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-<?= $this->session->flashdata('type'); ?>"><?= $this->session->flashdata('message'); ?></div>
            <?php endif; ?>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
        </form>
    </div>