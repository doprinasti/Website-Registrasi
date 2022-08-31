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
        <h4><b>Laporan Pendaftaran Surat Kuasa pada Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?></b></h4>
    </center>

    <table class="table table-sm table-bordered">
        <thead class="thead-light">
            <tr>
                <br>
                <th class="text-center">No.</th>
                <th class="text-center">No. Pendaftaran</th>
                <th class="text-center">Nama Badan Usaha</th>
                <th class="text-center">Pihak Pertama</th>
                <th class="text-center">Pihak Kedua</th>
                <th class="text-center">Tanggal Daftar</th>
                <th class="text-center">Nama Pengurus</th>
                <th class="text-center">TK Pertama</th>
                <th class="text-center">TK Banding</th>
                <th class="text-center">TK Eksekusi</th>
                <th class="text-center">TK Kasasi</th>
                <th class="text-center">TK PK</th>
                <th class="text-center">Tanggal Ambil</th>
                <th class="text-center">Dokumen</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($surku as $s) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $s->noreg ?></td>
                    <td><?php echo $s->namabu ?></td>
                    <td><?php echo $s->namapbk ?></td>
                    <td><?php echo $s->namapnk ?></td>
                    <td><?php echo $s->tgldaftar ?></td>
                    <td><?php echo $s->pengurus ?></td>
                    <!-- untuk menampilkan dokumen -->
                    <td><?php echo $s->tk1 ?></td>
                    <td><?php echo $s->tkbanding ?></td>
                    <td><?php echo $s->tkeksekusi ?></td>
                    <td><?php echo $s->tkkasasi ?></td>
                    <td><?php echo $s->tkpk ?></td>
                    <td><?php echo $s->tglambil ?></td>
                    <!-- untuk menampilkan dokumen -->
                    <td><?php echo $s->catatan ?></td>
                    <!-- untuk menampilkan format rupiah 
                <td>Rp <?php echo number_format($s->biaya, 0, ',', '.') ?></td>-->
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