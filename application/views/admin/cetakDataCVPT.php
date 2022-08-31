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
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
    } else {
        $bulan = date('m');
        $tahun = date('Y');
    }
    ?>

    <center>
        <!--<h2>PENGADILAN NEGERI SLEMAN</h2>
        <h3>Daftar Pendaftaran CV/PT</h3>-->
        <img src="<?php echo base_url(); ?>assets/image/logopnsleman3.png" width=100% height=200px>
        <hr>
        <h4><b>Laporan Pendaftaran CV/PT pada Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?></b></h4>
    </center>

    <table id="example" class="table table-sm table-bordered display nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <br>
                <th class="text-center">No.</th>
                <th class="text-center">Jenis Badan Usaha</th>
                <th class="text-center">No. Pendaftaran</th>
                <th class="text-center">Nama Badan Usaha</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Tanggal Akta</th>
                <th class="text-center">Tanggal Daftar</th>
                <th class="text-center">No. Akta</th>
                <th class="text-center">Notaris</th>
                <th class="text-center">Jangka Waktu</th>
                <th class="text-center">Nama Pengurus</th>
                <th class="text-center">Dokumen</th>
                <th class="text-center">Tanggal Ambil</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($ptcv as $p) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $p->jenisbu ?></td>
                    <td><?php echo $p->noreg ?></td>
                    <td><?php echo $p->namabu ?></td>
                    <td><?php echo $p->alamatbu ?></td>
                    <td><?php echo $p->tglakta ?></td>
                    <td><?php echo $p->tgldaftar ?></td>
                    <td><?php echo $p->noakta ?></td>
                    <!-- untuk menampilkan nama notaris 
                <td><?php echo $p->nama ?></td>-->
                    <td><?php echo $p->idnotaris ?></td>
                    <td><?php echo $p->jangkawaktu ?></td>
                    <td><?php echo $p->pengurus ?></td>
                    <!-- untuk menampilkan dokumen -->
                    <td><?php echo $p->catatan ?></td>
                    <td><?php echo $p->tglambil ?></td>
                    <!-- untuk menampilkan format rupiah 
                <td>Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>-->
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