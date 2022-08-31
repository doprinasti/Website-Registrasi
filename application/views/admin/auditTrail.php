<head>
    <meta charset="utf-8" />
    <meta content="width-device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
</head>

<body>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
            <div class="navbar-form navbar-right">
                <?php echo form_open('admin/auditTrail/') ?>
                <input type="text" class="form-control-sm" placeholder="cari user..." name="keyword" autocomplete="off" autofocus value="<?php echo $keyword ?>">
                <input class="btn btn-sm btn-secondary mb-1" type="submit" name="submit" value="Cari"></input>
                <?php echo form_close() ?>
                <p class="mb-0"><i>Hasil pencarian : <?php echo $total_rows ?></i></p>
            </div>
        </div>

        <a class=" btn btn-sm btn-primary mb-1" href="<?php echo base_url('admin/AuditTrail/cetakData/') ?>">
            <i class="fas fa-print"></i>Cetak
        </a>

        <div class="card mb-1">
            <div class="card-header bg-white text-black">
                <b>Filter Data</b>
            </div>
            <div class="card-body">
                <form class="form-inline" action="<?php echo base_url('admin/AuditTrail/filter') ?>">
                    <div class="form-group mb-1">
                        <label for="staticEmail2">Mulai: </label>
                        <input class="form-control ml-2" name="tglawal" id="tglawal" type="date"></input>
                    </div>
                    <div class="form-group mb-1 ml-3">
                        <label for="staticEmail2">sampai dengan: </label>
                        <input class="form-control ml-2" name="tglakhir" id="tglakhir" type="date"></input>
                        <?php
                        if ((isset($_GET['tglawal']) && $_GET['tglawal'] != '') && (isset($_GET['tglakhir']) && $_GET['tglakhir'] != '')) {
                            $tglawal = $_GET['tglawal'];
                            $tglakhir = $_GET['tglakhir'];
                        } else {
                            $tglawal = date('d-m-Y');
                            $tglakhir = date('d-m-Y');
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success mb-1 ml-auto"><i class="fas fa-filter"></i> Filter Data</button>
                    <a class=" btn btn-sm btn-primary mb-1 ml-3" href="<?php echo base_url('admin/auditTrail') ?>">
                        <i class="fas fa-eye mr-1"></i>Tampilkan Semua Data
                    </a>
                </form>
            </div>
        </div>

        <p>
            <i>Data pada :
                <span class="font-weight-bold mb-1"><?php echo date('d-m-Y', strtotime($tglawal)) ?></span>
                sampai dengan : <span class="font-weight-bold mb-1"><?php echo date('d-m-Y', strtotime($tglakhir)) ?></span></i>
        </p>

        <?php echo $this->pagination->create_links(); ?>

        <?php if (empty($log_activities)) : ?>
            <div class="alert alert-danger mb-1" role="alert">
                Data Tidak Ditemukan!
            </div>
        <?php endif; ?>

        <div class="mb-5" style="display:flex; overflow-x:auto;">
            <table id="datatable" class="table table-sm table-bordered display nowrap mb-2">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Nama Table</th>
                        <th class="text-center">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($log_activities as $log) : ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $log->create_by ?></td>
                            <td><?php echo $log->description ?></td>
                            <td><?php echo $log->tables_name ?></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($log->create_date)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>