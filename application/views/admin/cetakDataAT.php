<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>

<body>
    <center>
        <!--<h2>PENGADILAN NEGERI SLEMAN</h2>
        <h3>Daftar Pendaftaran CV/PT</h3>-->
        <img src="<?php echo base_url(); ?>assets/image/logopnsleman3.png" width=100% height=200px>
        <hr>
        <h4><b>Audit Trail yang Dilakukan oleh Seluruh User</b></h4>
    </center>

    <table id="example" class="table table-sm table-bordered display nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <br>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Tabel</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Nama User</th>
                <th class="text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($log_activities as $l) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $l->tables_name ?></td>
                    <td><?php echo $l->description ?></td>
                    <td><?php echo $l->create_by ?></td>
                    <td><?php echo $l->create_date ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table width="100%">
        <tr><br><br></tr>
        <tr>
            <td></td>
            <td width="200px">
                <p>Yogyakarta, <?php echo date("d F Y") ?><br> (Jabatan) </p>
                <br>
                <br>
                <p>_________________________</p>
            </td>
        </tr>
    </table>
</body>
</head>

</html>

<script type="text/javascript">
    window.print();
</script>