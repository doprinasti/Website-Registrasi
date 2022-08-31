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

            <?php foreach ($surku as $s) : ?>

                <form method="POST" action="<?php echo base_url('user/suratKuasa/editDataAksi') ?>">
                    <div class="form-group">
                        <label>Nomor Pendaftaran</label>
                        <input type="hidden" name="idsu" class="form-control" value="<?php echo $s->idsu ?>">
                        <input type="text" name="noreg" class="form-control" value="<?php echo $s->noreg ?>">
                        <?php echo form_error('noreg', '<div class="text-small text-danger" ></div>') ?>
                        <label>Nama Badan Usaha</label>
                        <input type="text" name="namabu" class="form-control" value="<?php echo $s->namabu ?>">
                        <?php echo form_error('namabu', '<div class="text-small text-danger" ></div>') ?>
                        <label>Pihak Pertama</label>
                        <input type="text" name="namapbk" class="form-control" value="<?php echo $s->namapbk ?>">
                        <?php echo form_error('namapbk', '<div class="text-small text-danger" ></div>') ?>
                        <label>Pihak Kedua</label>
                        <input type="text" name="namapnk" class="form-control" value="<?php echo $s->namapnk ?>">
                        <?php echo form_error('namapnk', '<div class="text-small text-danger" ></div>') ?>
                        <label>Tanggal Daftar</label>
                        <input type="date" name="tgldaftar" class="form-control" value="<?php echo $s->tgldaftar ?>">
                        <?php echo form_error('tgldaftar', '<div class="text-small text-danger" ></div>') ?>
                        <label>Nama Pengurus</label>
                        <input type="text" name="pengurus" class="form-control" value="<?php echo $s->pengurus ?>">
                        <?php echo form_error('pengurus', '<div class="text-small text-danger" ></div>') ?>
                        <label>TK Pertama</label>
                        <input type="text" name="tk1" class="form-control" value="<?php echo $s->tk1 ?>">
                        <?php echo form_error('tk1', '<div class="text-small text-danger" ></div>') ?>
                        <label>TK Banding</label>
                        <input type="text" name="tkbanding" class="form-control" value="<?php echo $s->tkbanding ?>">
                        <?php echo form_error('tkbanding', '<div class="text-small text-danger" ></div>') ?>
                        <label>TK Eksekusi</label>
                        <input type="text" name="tkeksekusi" class="form-control" value="<?php echo $s->tkeksekusi ?>">
                        <?php echo form_error('tkeksekusi', '<div class="text-small text-danger" ></div>') ?>
                        <label>TK Kasasi</label>
                        <input type="text" name="tkkasasi" class="form-control" value="<?php echo $s->tkkasasi ?>">
                        <?php echo form_error('tkkasasi', '<div class="text-small text-danger" ></div>') ?>
                        <label>TK PK</label>
                        <input type="text" name="tkpk" class="form-control" value="<?php echo $s->tkpk ?>">
                        <?php echo form_error('tkpk', '<div class="text-small text-danger" ></div>') ?>
                        <label>Tanggal Ambil</label>
                        <input type="date" name="tglambil" class="form-control" value="<?php echo $s->tglambil ?>">
                        <?php echo form_error('tglambil', '<div class="text-small text-danger" ></div>') ?>
                        <label>Dokumen</label>
                        <input type="text" name="catatan" class="form-control" value="<?php echo $s->catatan ?>">
                        <?php echo form_error('catatan', '<div class="text-small text-danger" ></div>') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->