<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <div class="navbar-form navbar-right">
            <?php echo form_open('admin/daftarKonfigurasi') ?>
            <input type="text" class="form-control-sm" placeholder="cari instansi..." name="keyword" autocomplete="off" autofocus>
            <input class="btn btn-sm btn-secondary mb-1" type="submit" name="submit" value="Cari"></input>
            <?php echo form_close() ?>
            <p class="mb-0"><i>Hasil pencarian : <?php echo $total_rows ?></i></p>
        </div>
    </div>

    <a class=" btn btn-sm btn-primary mb-2 shadow" href="<?php echo base_url('admin/DaftarKonfigurasi/tambahData/') ?>">
        <i class="fas fa-plus mr-1"></i>Tambah Data
    </a>

    <?php echo $this->pagination->create_links(); ?>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php if (empty($config)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Tidak Ditemukan!
        </div>
    <?php endif; ?>

    <div class="wrapper" style="display:flex; overflow-x:auto;">
        <table class="table table-sm table-bordered">
            <thead class="thead-light">
                <th class="text-center">No.</th>
                <th class="text-center">Instansi</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($config as $c) : ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $c->instansi ?></td>
                        <td><?php echo $c->alamat ?></td>
                        <td><?php echo $c->email ?></td>
                        <td>
                            <center>
                                <a class="btn btn-sm btn-warning ml-auto" href="<?php echo base_url('admin/daftarKonfigurasi/editData/' . $c->id) ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Anda Yakin untuk Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/daftarKonfigurasi/hapusData/' . $c->id) ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->