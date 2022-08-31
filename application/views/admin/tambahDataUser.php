<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/dataUser') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="card" style="width:50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/dataUser/tambahDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>User ID</label>
                    <input type="text" name="userid" class="form-control" value="<?php echo set_value('userid') ?>">
                    <?php echo form_error('userid', '<small class="text-danger pl-3">', '</small>'); ?>
                    <!--<small class="text-danger"><?php echo form_error('userid'); ?></small>-->
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>">
                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    <!--<small class="text-danger"><?php echo form_error('username'); ?></small>-->
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <select name="usertype" class="form-control">
                        <option value="">--Pilih Usertype--</option>
                        <option value="admin">Admin</option>
                        <option value="pegawai">Pegawai</option>
                    </select>
                    <?php echo form_error('usertype', '<small class="text-danger pl-3">', '</small>'); ?>
                    <!--<small class="text-danger"><?php echo form_error('usertype'); ?></small>-->
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control">
                    <?php echo form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
                    <!--<small class="text-danger"><?php echo form_error('password'); ?></small>-->
                </div>
                <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="password" name="pass2" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->