            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?= $judul_halaman ?></div>
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
                                    <th class="text-center">Aksi</th>
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
                                            <?= strtotime("+3 days") > strtotime($penghuni->tgl_keluar) ? '<span class="badge badge-danger">' . $penghuni->harga . '</span>' : '<span class="badge badge-success">Sudah Lunas</span>'; ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning active detail-penghuni" id="<?= $penghuni->id ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail">
                                                <span class="fa fa-info-circle"></span>
                                            </a>
                                            <a class="btn btn-sm btn-success active edit-huni" href="<?= base_url('tambah-pembayaran/' . $penghuni->id) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Pembayaran">
                                                <span class="fa fa-dollar"></span>
                                            </a>
                                            <a class="btn btn-sm btn-info active edit-huni" href="<?= base_url('edit-penghuni/' . $penghuni->id) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Data">
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                            <a class="btn btn-sm btn-danger active hapus-penghuni" id="<?= $penghuni->id ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Akun">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                            <?php if (strtotime("+3 days") > strtotime($penghuni->tgl_keluar)) : ?>
                                                <a class="btn btn-sm btn-success active mb-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hubungi dengan Whatsapp" href="https://wa.me/<?= $penghuni->telepon ?>?text=Assalamu'alaikum kepada penghuni atas nama <?= $penghuni->nama ?> disegerakan membayar tunggakannya pada bulan ini sebesar <?= 'Rp' . number_format($penghuni->harga, 0, ',', '.') ?>" target="_blank">
                                                    <span class="fa fa-whatsapp"></span>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->