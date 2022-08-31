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
                    } else {
                        $bulan = date('m');
                        $tahun = date('Y');
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-sm btn-success mb-1 ml-auto"><i class="fas fa-filter"></i> Filter Data</button>
                <?php if (count($ptcv) > 0) { ?>
                    <a class=" btn btn-sm btn-primary mb-1 ml-3" href="<?php echo base_url('admin/lapPendafCVPT/cetakData?bulan=' . $bulan), '&tahun=' . $tahun ?>">
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

    <?php $jum_data = count($ptcv);
    if ($jum_data > 0) { ?>
        <div class="" style="display:flex; overflow-x:auto;">
            <table id="example" class="table table-sm table-bordered display nowrap mb-3">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Jenis Badan Usaha</th>
                        <th class="text-center">No. Pendaftaran</th>
                        <th class="text-center">Nama Badan Usaha</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Tanggal Akta</th>
                        <th class="text-center">Tanggal Daftar</th>
                        <th class="text-center">No. Akta</th>
                        <th class="text-center">Notaris</th>
                        <th class="text-center">Jangka Waktu</th>
                        <th class="text-center">Nama Pengurus</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">Tanggal Ambil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ptcv as $p) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p->jenisbu ?></td>
                            <td><?php echo $p->noreg ?></td>
                            <td><?php echo $p->namabu ?></td>
                            <td><?php echo $p->alamatbu ?></td>
                            <td><?php echo $p->tglakta ?></td>
                            <td><?php echo $p->tgldaftar ?></td>
                            <td><?php echo $p->noakta ?></td>
                            <!-- untuk menampilkan nama notaris 
                <td><?php echo $p->nama ?></td>-->
                            <td><?php echo $p->idnotaris ?></td>
                            <td><?php echo $p->jangkawaktu ?></td>
                            <td><?php echo $p->pengurus ?></td>
                            <!-- untuk menampilkan dokumen -->
                            <td><?php echo $p->catatan ?></td>
                            <td><?php echo $p->tglambil ?></td>
                            <!-- untuk menampilkan format rupiah 
                <td>Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>-->
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