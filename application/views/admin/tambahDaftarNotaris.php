<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/daftarNotaris') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/daftarNotaris/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>Nama Notaris</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat Notaris</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?>">
                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Nomor Akta</label>
                    <input type="text" name="akta" class="form-control" value="<?php echo set_value('akta') ?>">
                    <?php echo form_error('akta', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        </div>
        <button class="btn btn-primary" type="submit">Tambah</button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->