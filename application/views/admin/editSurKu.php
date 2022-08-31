<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/suratKuasa') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">

            <?php foreach ($surku as $s) : ?>

                <?php echo form_open_multipart('admin/suratKuasa/editDataAksi'); ?>
                <div class="form-group">
                    <label>No. Pendaftaran</label>
                    <input type="hidden" name="idsu" class="form-control" value="<?php echo $s->idsu ?>">
                    <input type="text" name="noreg" class="form-control" value="<?php echo $s->noreg ?>">
                    <small class="text-danger"><?php echo form_error('noreg'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Badan Usaha</label>
                    <input type="text" name="namabu" class="form-control" value="<?php echo $s->namabu ?>">
                    <small class="text-danger"><?php echo form_error('namabu'); ?></small>
                </div>
                <div class="form-group">
                    <label>Pihak Pertama</label>
                    <input type="text" name="namapbk" class="form-control" value="<?php echo $s->namapbk ?>">
                    <small class="text-danger"><?php echo form_error('namapbk'); ?></small>
                </div>
                <div class="form-group">
                    <label>Pihak Kedua</label>
                    <input type="text" name="namapnk" class="form-control" value="<?php echo $s->namapnk ?>">
                    <small class="text-danger"><?php echo form_error('namapnk'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tgldaftar" class="form-control" value="<?php echo $s->tgldaftar ?>">
                    <small class="text-danger"><?php echo form_error('tgldaftar'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Pengurus</label>
                    <input type="text" name="pengurus" class="form-control" value="<?php echo $s->pengurus ?>">
                    <small class="text-danger"><?php echo form_error('pengurus'); ?></small>
                </div>
                <div class="form-group">
                    <label>TK Pertama</label>
                    <input type="text" name="tk1" class="form-control" value="<?php echo $s->tk1 ?>">
                    <small class="text-danger"><?php echo form_error('tk1'); ?></small>
                </div>
                <div class="form-group">
                    <label>TK Banding</label>
                    <input type="text" name="tkbanding" class="form-control" value="<?php echo $s->tkbanding ?>">
                    <small class="text-danger"><?php echo form_error('tkbanding'); ?></small>
                </div>
                <div class="form-group">
                    <label>TK Eksekusi</label>
                    <input type="text" name="tkeksekusi" class="form-control" value="<?php echo $s->tkeksekusi ?>">
                    <small class="text-danger"><?php echo form_error('tkeksekusi'); ?></small>
                </div>
                <div class="form-group">
                    <label>TK Kasasi</label>
                    <input type="text" name="tkkasasi" class="form-control" value="<?php echo $s->tkkasasi ?>">
                    <small class="text-danger"><?php echo form_error('tkkasasi'); ?></small>
                </div>
                <div class="form-group">
                    <label>TK PK</label>
                    <input type="text" name="tkpk" class="form-control" value="<?php echo $s->tkpk ?>">
                    <small class="text-danger"><?php echo form_error('tkpk'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Ambil</label>
                    <input type="date" name="tglambil" class="form-control" value="<?php echo $s->tglambil ?>">
                    <small class="text-danger"><?php echo form_error('tglambil'); ?></small>
                </div>
                <div class="form-group">
                    <label>Dokumen</label>
                    <input type="file" name="catatan" class="form-control" size="20">
                    <p><img src="https://th.bing.com/th/id/OIP.zYr3OoqATZ-lYZIkRNUF1QHaHa?pid=ImgDet&rs=1" width="20px"><?php echo  $s->catatan; ?></p>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
                <?php echo form_close(); ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->