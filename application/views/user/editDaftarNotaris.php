<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class=" btn btn-sm btn-primary mb-2" href="<?php echo base_url('user/daftarNotaris') ?>">
        <i class="fas fa-arrow-left mr-1"></i>Kembali
    </a>

    <div class="card" style="width:50%">
        <div class="card-body">

            <?php foreach ($notaris as $n) : ?>

                <form method="POST" action="<?php echo base_url('user/daftarNotaris/editDataAksi') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $n->id ?>">
                        <label>Nama Notaris</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $n->nama ?>">
                        <?php echo form_error('nama', '<div class="text-small text-danger" ></div>') ?>
                        <label>Alamat Notaris</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $n->alamat ?>">
                        <?php echo form_error('alamat', '<div class="text-small text-danger" ></div>') ?>
                        <label>Nomor Akta</label>
                        <input type="text" name="akta" class="form-control" value="<?php echo $n->akta ?>">
                        <?php echo form_error('akta', '<div class="text-small text-danger" ></div>') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->