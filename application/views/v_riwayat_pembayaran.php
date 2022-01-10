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
                                    <th class="text-center">Tanggal Pembayaran</th>
                                    <th class="text-center">Jumlah Pembayaran</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pembayaran as $pembayaran) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $pembayaran->no_kamar ?></td>
                                        <td><?= $pembayaran->nama ?></td>
                                        <td class="text-center"><?= date('d M Y', strtotime($pembayaran->tgl_bayar)) ?></td>
                                        <td class="text-center"><?= 'Rp' . number_format($pembayaran->bayar, 0, ',', '.') ?></td>
                                        <td><?= $pembayaran->ket ?></td>
                                        <td class="text-center">
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