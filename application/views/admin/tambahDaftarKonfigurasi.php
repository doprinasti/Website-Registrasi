<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/daftarKonfigurasi') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/daftarKonfigurasi/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>Nama Instansi</label>
                    <input type="text" name="instansi" class="form-control" value="<?php echo set_value('instansi') ?>">
                    <?php echo form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat Instansi</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?>">
                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->