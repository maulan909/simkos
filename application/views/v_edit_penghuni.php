            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Penghuni</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">

                        <form class="form-horizontal" action="<?= base_url('edit-penghuni/' . $penghuni->id) ?>" method="post">
                            <input type="hidden" name="id" value="<?= $penghuni->id ?>">
                            <div class="form-group row pk">
                                <label class="col-sm-3 col-form-label">No. Kamar</label>
                                <div class="col-sm-9">
                                    <select class="form-control <?= form_error('no_kamar') ? 'is-invalid' : ''; ?> select2_kamar form_pindah" name="no_kamar" required>
                                        <option value="<?= $penghuni->no_kamar; ?>" <?= set_value('no_kamar') == $penghuni->no_kamar || set_value('no_kamar') == null ? 'selected' : ''; ?>><?= $penghuni->no_kamar; ?> (Kamar Sekarang)</option>
                                        <?php foreach ($kamar as $kamar) { ?>
                                            <option value="<?= $kamar->no_kamar; ?>" <?= set_value('no_kamar') == $kamar->no_kamar ? 'selected' : ''; ?>><?= $kamar->no_kamar; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= form_error('no_kamar'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama" id="nama" placeholder="Nama Lengkap Penghuni" value="<?= form_error('nama') ? set_value('nama') : $penghuni->nama; ?>" maxlength="200" oninput="this.value = this.value.replace(/[^a-z A-Z ' .]/g, '');" required>
                                    <div class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. KTP</label>
                                <div class="col-sm-9">
                                    <input class="form-control <?= form_error('nik') ? 'is-invalid' : ''; ?>" type="text" name="nik" id="nik" placeholder="No. KTP Penghuni" value="<?= form_error('nik') ? set_value('nik') : $penghuni->nik; ?>" maxlength="50" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    <div class="invalid-feedback">
                                        <?= form_error('nik'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat Asal</label>
                                <div class="col-sm-9">
                                    <input class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>" type="text" name="alamat" placeholder="Alamat Asal Penghuni" value="<?= form_error('alamat') ? set_value('alamat') : $penghuni->alamat; ?>" maxlength="200">
                                    <div class="invalid-feedback">
                                        <?= form_error('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telp/HP</label>
                                <div class="col-sm-9">
                                    <div class="input-group-icon">
                                        <div class="input-icon">62</div>
                                        <input class="form-control <?= form_error('telepon') ? 'is-invalid' : ''; ?>" type="text" name="telepon" placeholder="No. Telp/HP Penghuni" value="<?= form_error('telepon') ? set_value('telepon') : substr($penghuni->telepon, 2); ?>" maxlength="30" oninput="this.value = this.value.replace(/[^0-9 +]/g, '');">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('telepon'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Masa Huni</label>
                                <div class="col-sm-9 input-group" id="tgl_huni">
                                    <input class="input-sm form-control flex-wrap" type="date" name="tgl_masuk" id="tgl_masuk" placeholder="Pilih Tanggal Masuk" value="<?= $penghuni->tgl_masuk; ?>" autocomplete="off" readonly>
                                    <!-- <input type="date" name="tgl_masuk" id="tgl_masuk"> -->
                                    <span class="input-group-addon p-l-10 p-r-10">s.d.</span>
                                    <input class="input-sm form-control <?= form_error('tgl_keluar') ? 'is-invalid' : ''; ?>" type="date" name="tgl_keluar" id="tgl_keluar" placeholder="Pilih Tanggal Keluar" value="<?= form_error('tgl_keluar') ? set_value('tgl_keluar') : $penghuni->tgl_keluar; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Harus Dibayar</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="biaya" value="<?= $penghuni->harga ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9 ml-sm-auto">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="button" onclick="window.history.back()">Batal</button>
                                    <!-- <button class="btn btn-outline-default" type="reset" value="Reset">Reset</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->