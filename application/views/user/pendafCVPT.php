<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <div class="navbar-form navbar-right">
            <?php echo form_open('user/pendafCVPT') ?>
            <input type="text" class="form-control-sm" placeholder="cari nomor pendaftaran..." name="keyword" value="<?php echo $keyword ?>" autocomplete="off" autofocus>
            <input class="btn btn-sm btn-secondary mb-1" type="submit" name="submit" value="Cari"></input>
            <?php echo form_close() ?>
            <p class="mb-0"><i>Hasil pencarian : <?php echo $total_rows ?></i></p>
        </div>
    </div>

    <a class=" btn btn-sm btn-primary mb-2 shadow" href="<?php echo base_url('user/pendafCVPT/tambahData/') ?>">
        <i class="fas fa-plus mr-1"></i>Tambah Data
    </a>

    <?php echo $this->pagination->create_links(); ?>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php if (empty($ptcv)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan!
        </div>
    <?php endif; ?>

    <div class="wrapper" style="display:flex; overflow-x:auto;">
        <table class="table table-sm table-bordered">
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
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($ptcv as $p) : ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <!-- <td><?php echo $no++ ?></td> -->
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
                        <td>
                            <center>
                                <a class="btn btn-sm btn-warning mb-2" href="<?php echo base_url('user/pendafCVPT/editData/' . $p->id_pt) ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Anda Yakin untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('user/pendafCVPT/hapusData/' . $p->id_pt) ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->