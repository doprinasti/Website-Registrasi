<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <div class="navbar-form navbar-right">
            <?php echo form_open('admin/suratKuasa') ?>
            <input type="text" class="form-control-sm" placeholder="cari nomor pendaftaran..." name="keyword" value="<?php echo $keyword ?>" autocomplete="off" autofocus value="<?php echo $keyword ?>">
            <input class="btn btn-sm btn-secondary mb-1" type="submit" name="submit" value="Cari"></input>
            <?php echo form_close() ?>
            <p class="mb-0"><i>Hasil pencarian : <?php echo $total_rows ?></i></p>
        </div>
    </div>


    <a class=" btn btn-sm btn-primary mb-2 shadow" href="<?php echo base_url('admin/SuratKuasa/tambahData/') ?>">
        <i class="fas fa-plus mr-1"></i>Tambah Data
    </a>

    <?php echo $this->pagination->create_links(); ?>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php if (empty($surku)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan!
        </div>
    <?php endif; ?>

    <div class="wrapper" style="display:flex; overflow-x:auto;">
        <table class="table table-sm table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Action</th>
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
                        <td>
                            <center>
                                <a class="btn btn-sm btn-warning mb-2" href="<?php echo base_url('admin/suratKuasa/editData/' . $s->idsu) ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Anda Yakin untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/suratKuasa/hapusData/' . $s->idsu) ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </center>
                        </td>
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

</div>
<!-- /.container-fluid -->