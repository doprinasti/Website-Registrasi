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
            <?php echo form_open_multipart('admin/suratKuasa/tambahDataAksi'); ?>
            <div class="form-group">
                <label>No. Pendaftaran</label>
                <input type="hidden" name="idsu" class="form-control">
                <input type="text" name="noreg" class="form-control">
                <small class="text-danger"><?php echo form_error('noreg'); ?></small>
            </div>
            <div class="form-group">
                <label>Nama Badan Usaha</label>
                <input type="text" name="namabu" class="form-control">
                <small class="text-danger"><?php echo form_error('namabu'); ?></small>
            </div>
            <div class="form-group">
                <label>Pihak Pertama</label>
                <input type="text" name="namapbk" class="form-control">
                <small class="text-danger"><?php echo form_error('namapbk'); ?></small>
            </div>
            <div class="form-group">
                <label>Pihak Kedua</label>
                <input type="text" name="namapnk" class="form-control">
                <small class="text-danger"><?php echo form_error('namapnk'); ?></small>
            </div>
            <div class="form-group">
                <label>Tanggal Daftar</label>
                <input type="date" name="tgldaftar" class="form-control">
                <small class="text-danger"><?php echo form_error('tgldaftar'); ?></small>
            </div>
            <div class="form-group">
                <label>Nama Pengurus</label>
                <input type="text" name="pengurus" class="form-control">
                <small class="text-danger"><?php echo form_error('pengurus'); ?></small>
            </div>
            <div class="form-group">
                <label>TK Pertama</label>
                <input type="text" name="tk1" class="form-control">
                <small class="text-danger"><?php echo form_error('tk1'); ?></small>
            </div>
            <div class="form-group">
                <label>TK Banding</label>
                <input type="text" name="tkbanding" class="form-control">
                <small class="text-danger"><?php echo form_error('tkbanding'); ?></small>
            </div>
            <div class="form-group">
                <label>TK Eksekusi</label>
                <input type="text" name="tkeksekusi" class="form-control">
                <small class="text-danger"><?php echo form_error('tkeksekusi'); ?></small>
            </div>
            <div class="form-group">
                <label>TK Kasasi</label>
                <input type="text" name="tkkasasi" class="form-control">
                <small class="text-danger"><?php echo form_error('tkkasasi'); ?></small>
            </div>
            <div class="form-group">
                <label>TK PK</label>
                <input type="text" name="tkpk" class="form-control">
                <small class="text-danger"><?php echo form_error('tkpk'); ?></small>
            </div>
            <div class="form-group">
                <label>Tanggal Ambil</label>
                <input type="date" name="tglambil" class="form-control">
                <small class="text-danger"><?php echo form_error('tglambil'); ?></small>
            </div>
            <div class="form-group">
                <label>Dokumen</label>
                <input type="file" name="catatan" class="form-control" size="20">
            </div>
            <button class="btn btn-primary" type="submit">Tambah</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->