            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?= $judul_halaman ?></div>
                        <!-- <a href="#" class="btn btn-primary ms-auto">Tambah</a> -->
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="tabel-penghuni" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 24.5px">No.</th>
                                    <th class="text-center">No. Kamar</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Status Penghuni</th>
                                    <th class="text-center">Masa Huni</th>
                                    <th class="text-center">Tagihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($penghuni as $penghuni) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $penghuni->no_kamar ?></td>
                                        <td><?= $penghuni->nama ?></td>
                                        <td class="text-center"><?= $penghuni->telepon ?></td>
                                        <td class="text-center"><?= $penghuni->is_active == 0 ? '<span class="badge badge-info">Pemesan</span>' : '<span class="badge badge-success">Penghuni</span>'; ?></td>
                                        <td class="text-center"><?= date('d M Y', strtotime($penghuni->tgl_masuk)) . ' - ' . date('d M Y', strtotime($penghuni->tgl_keluar)) ?></td>
                                        <td class="text-center">
                                            <?= strtotime("+3 days") > strtotime($penghuni->tgl_keluar) ? '<span class="badge badge-danger">Rp. ' . number_format(ceil(date_diff(date_create(date('Y-m-d', time())), date_create($penghuni->tgl_keluar))->format('%a') / 30) * $penghuni->harga, 0, ',', '.') . '</span>' : '<span class="badge badge-success">Sudah Lunas</span>'; ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->