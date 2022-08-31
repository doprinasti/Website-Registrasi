<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('admin/dataUser') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">
            <?php foreach ($user as $u) : ?>
                <form method="POST" action="<?php echo base_url('admin/dataUser/tambahDataAksi') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $u->id ?>">
                        <label>User ID</label>
                        <input type="text" name="userid" class="form-control" value="<?php echo $u->userid ?>">
                        <?php echo form_error('userid', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!--<small class="text-danger"><?php echo form_error('userid'); ?></small>-->
                    </div>
                    <div class="form-group"> <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $u->username ?>">
                        <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!--<small class="text-danger"><?php echo form_error('username'); ?></small>-->
                    </div>
                    <div class="form-group">
                        <label>User Type</label>
                        <select name="usertype" class="form-control">
                            <option value="<?php echo $u->usertype ?>"><?php echo $u->usertype ?></option>
                            <option value="admin">Admin</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                        <?php echo form_error('usertype', '<small class="text-danger pl-3">', '</small>'); ?>
                        <!--<small class="text-danger"><?php echo form_error('usertype'); ?></small>-->
                    </div>
        </div>
        <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    <?php endforeach; ?>
    </div>
</div>

</div>
<!-- /.container-fluid -->