<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('user/suratKuasa') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('user/suratKuasa/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>No. Pendaftaran</label>
                    <input type="text" name="noreg" class="form-control">
                    <small class="text-danger"><?php echo form_error('noreg'); ?></small>
                    <label>Nama Badan Usaha</label>
                    <input type="text" name="namabu" class="form-control">
                    <small class="text-danger"><?php echo form_error('namabu'); ?></small>
                    <label>Pihak Pertama</label>
                    <input type="text" name="namapbk" class="form-control">
                    <small class="text-danger"><?php echo form_error('namapbk'); ?></small>
                    <label>Pihak Kedua</label>
                    <input type="text" name="namapnk" class="form-control">
                    <small class="text-danger"><?php echo form_error('namapnk'); ?></small>
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tgldaftar" class="form-control">
                    <small class="text-danger"><?php echo form_error('tgldaftar'); ?></small>
                    <label>Nama Pengurus</label>
                    <input type="text" name="pengurus" class="form-control">
                    <small class="text-danger"><?php echo form_error('pengurus'); ?></small>
                    <label>TK Pertama</label>
                    <input type="text" name="tk1" class="form-control">
                    <small class="text-danger"><?php echo form_error('tk1'); ?></small>
                    <label>TK Banding</label>
                    <input type="text" name="tkbanding" class="form-control">
                    <small class="text-danger"><?php echo form_error('tkbanding'); ?></small>
                    <label>TK Eksekusi</label>
                    <input type="text" name="tkeksekusi" class="form-control">
                    <small class="text-danger"><?php echo form_error('tkeksekusi'); ?></small>
                    <label>TK PK</label>
                    <input type="text" name="tkpk" class="form-control">
                    <small class="text-danger"><?php echo form_error('tkpk'); ?></small>
                    <label>Tanggal Ambil</label>
                    <input type="date" name="tglambil" class="form-control">
                    <small class="text-danger"><?php echo form_error('tglambil'); ?></small>
                    <label>Dokumen</label>
                    <input type="text" name="catatan" class="form-control">
                    <small class="text-danger"><?php echo form_error('catatan'); ?></small>
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->