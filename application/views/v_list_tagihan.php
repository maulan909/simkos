            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?= $judul_halaman ?></div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="tabel-responsif" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 24.5px">No.</th>
                                    <th class="text-center">No. Kamar</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Biaya Sewa Sampai</th>
                                    <th class="text-center">Total Bayar</th>
                                    <th class="text-center">Terbayar</th>
                                    <th class="text-center">Hutang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $date = null;
                                foreach ($pembayaran as $pembayaran) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $pembayaran->no_kamar ?></td>
                                        <td><?= $pembayaran->nama ?></td>
                                        <td class="text-center"><?= date('d M Y', $date = $date ? $date + 2678400 : strtotime($pembayaran->tgl_keluar) + 2678400) ?></td>
                                        <td class="text-center"><?= 'Rp. ' . number_format($pembayaran->hutang, 0, ',', '.') ?></td>
                                        <td class="text-center"><?= 'Rp. ' . number_format($pembayaran->bayar, 0, ',', '.') ?></td>
                                        <td class="text-center"><?= 'Rp. ' . number_format($pembayaran->hutang - $pembayaran->bayar, 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-success active edit-huni" href="<?= base_url('tambah-pembayaran/' . $pembayaran->id) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Pembayaran">
                                                <span class="fa fa-dollar"></span>
                                            </a>
                                            <a class="btn btn-sm btn-danger active hapus-pembayaran" id="<?= $pembayaran->id ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Riwayat">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->