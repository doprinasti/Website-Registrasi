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
        </div>

        <a class=" btn btn-sm btn-primary mb-1" href="<?php echo base_url('user/AuditTrail/cetakData/') ?>">
            <i class="fas fa-print"></i>Cetak
        </a>



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
                        <tr class="text-center">
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