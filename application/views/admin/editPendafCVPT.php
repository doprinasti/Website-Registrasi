<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/pendafCVPT') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">

            <?php foreach ($ptcv as $p) : ?>

                <?php echo form_open_multipart('admin/pendafCVPT/editDataAksi'); ?>
                <div class="form-group">
                    <label>Jenis Badan Usaha</label>
                    <input type="hidden" name="id_pt" class="form-control" value="<?php echo $p->id_pt ?>">
                    <input type="text" name="jenisbu" class="form-control" value="<?php echo $p->jenisbu ?>">
                    <small class="text-danger"><?php echo form_error('jenisbu'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nomor Pendaftaran</label>
                    <input type="text" name="noreg" class="form-control" value="<?php echo $p->noreg ?>">
                    <small class="text-danger"><?php echo form_error('noreg'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Badan Usaha</label>
                    <input type="text" name="namabu" class="form-control" value="<?php echo $p->namabu ?>">
                    <small class="text-danger"><?php echo form_error('namabu'); ?></small>
                </div>
                <div class="form-group">
                    <label>Alamat Badan Usaha</label>
                    <input type="text" name="alamatbu" class="form-control" value="<?php echo $p->alamatbu ?>">
                    <small class="text-danger"><?php echo form_error('alamatbu'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Akta</label>
                    <input type="date" name="tglakta" class="form-control" value="<?php echo $p->tglakta ?>">
                    <small class="text-danger"><?php echo form_error('tglakta'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tgldaftar" class="form-control" value="<?php echo $p->tgldaftar ?>">
                    <small class="text-danger"><?php echo form_error('tgldaftar'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nomor Akta</label>
                    <input type="text" name="noakta" class="form-control" value="<?php echo $p->noakta ?>">
                    <small class="text-danger"><?php echo form_error('noakta'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Notaris</label>
                    <input type="text" name="idnotaris" class="form-control" value="<?php echo $p->idnotaris ?>">
                    <small class="text-danger"><?php echo form_error('idnotaris'); ?></small>
                </div>
                <div class="form-group">
                    <label>Jangka Waktu</label>
                    <input type="text" name="jangkawaktu" class="form-control" value="<?php echo $p->jangkawaktu ?>">
                    <small class="text-danger"><?php echo form_error('jangkawaktu'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Pengurus</label>
                    <input type="text" name="pengurus" class="form-control" value="<?php echo $p->pengurus ?>">
                    <small class="text-danger"><?php echo form_error('pengurus'); ?></small>
                </div>
                <div class="form-group">
                    <label>Dokumen</label>
                    <input type="file" name="catatan" class="form-control" size="20" value="">
                    <p><img src="https://th.bing.com/th/id/OIP.zYr3OoqATZ-lYZIkRNUF1QHaHa?pid=ImgDet&rs=1" width="20px"><?php echo  $p->catatan; ?></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Ambil</label>
                    <input type="date" name="tglambil" class="form-control" value="<?php echo $p->tglambil ?>">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Simpan</button>
                <?php echo form_close(); ?>

            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->