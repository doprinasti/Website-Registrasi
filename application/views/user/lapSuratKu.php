<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-1">
        <div class="card-header bg-white text-black">
            <b>Filter Data</b>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-1">
                    <label for="staticEmail2">Bulan: </label>
                    <select class="form-control ml-2" name="bulan" id="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-1 ml-3">
                    <label for="staticEmail2">Tahun: </label>
                    <select class="form-control ml-2" name="tahun" id="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = 2016; $i < $tahun + 5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>

                    <?php
                    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan . $tahun;
                    } else {
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $bulan . $tahun;
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-sm btn-success mb-1 ml-auto"><i class="fas fa-filter"></i> Filter Data</button>
                <?php if (count($surku) > 0) { ?>
                    <a class=" btn btn-sm btn-primary mb-1 ml-3" href="<?php echo base_url('user/lapSuratKu/cetakData?bulan=' . $bulan), '&tahun=' . $tahun ?>">
                        <i class="fas fa-print mr-1"></i>Cetak
                    </a>
                <?php } else { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary mb-1 ml-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-print mr-1"></i>Cetak
                    </button>
                <?php } ?>
            </form>
        </div>
    </div>

    <div class="alert alert-info mb-1">
        Data pada Bulan:
        <span class="font-weight-bold"><?php echo $bulan ?></span>
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <?php echo $this->pagination->create_links(); ?>

    <?php $jum_data = count($surku);
    if ($jum_data > 0) { ?>
        <div class="wrapper" style="display:flex; overflow-x:auto;">
            <table class="table table-sm table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">No. Pendaftaran</th>
                        <th class="text-center">Nama Badan Usaha</th>
                        <th class="text-center">Pihak Pertama</th>
                        <th class="text-center">Pihak Kedua</th>
                        <th class="text-center">Tanggal Daftar</th>
                        <th class="text-center">Nama Pengurus</th>
                        <th class="text-center">TK Pertama</th>
                        <th class="text-center">TK Banding</th>
                        <th class="text-center">TK Eksekusi</th>
                        <th class="text-center">TK Kasasi</th>
                        <th class="text-center">TK PK</th>
                        <th class="text-center">Tanggal Ambil</th>
                        <th class="text-center">Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($surku as $s) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $s->noreg ?></td>
                            <td><?php echo $s->namabu ?></td>
                            <td><?php echo $s->namapbk ?></td>
                            <td><?php echo $s->namapnk ?></td>
                            <td><?php echo $s->tgldaftar ?></td>
                            <td><?php echo $s->pengurus ?></td>
                            <!-- untuk menampilkan dokumen -->
                            <td><?php echo $s->tk1 ?></td>
                            <td><?php echo $s->tkbanding ?></td>
                            <td><?php echo $s->tkeksekusi ?></td>
                            <td><?php echo $s->tkkasasi ?></td>
                            <td><?php echo $s->tkpk ?></td>
                            <td><?php echo $s->tglambil ?></td>
                            <!-- untuk menampilkan dokumen -->
                            <td><?php echo $s->catatan ?></td>
                            <!-- untuk menampilkan format rupiah 
                <td>Rp <?php echo number_format($s->biaya, 0, ',', '.') ?></td>-->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data pada bulan dan tahun yang dipilih <b>masih kosong</b></span>
    <?php } ?>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data pada bulan dan tahun yang dipilih <b>masih kosong</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>