<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-1">
        <div class="card-header bg-white text-black">
            <b>Filter Data</b>
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-1">
                    <label for="staticEmail2">Bulan: </label>
                    <select class="form-control ml-2" name="bulan" id="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-1 ml-3">
                    <label for="staticEmail2">Tahun: </label>
                    <select class="form-control ml-2" name="tahun" id="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <!-- <?php foreach ($tahun as $t) : ?>
                            <option value="<?php echo $t->tahun ?>"><?php echo $t->tahun ?></option>
                        <?php endforeach ?>-->
                        <?php $tahun = date('Y');
                        for ($i = 2016; $i < $tahun + 5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-1 ml-auto"><i class="fas fa-eye"></i>Tampilkan Data</button>
            </form>
        </div>
    </div>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>

    <div class="alert alert-info mb-2">
        Data pada Bulan:
        <span class="font-weight-bold"><?php echo $bulan ?></span>
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>


    <!-- Content Row -->
    <div class="row">

        <!-- Data PT/CV -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center" action="<?php echo base_url('pendafCVPT') ?>">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data PT/CV</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cvpt ?></div>
                        </div>
                        <div class="col-auto">
                            <i class='far fa-file-alt fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Surat Kuasa -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Surat Kuasa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $surkuasa ?></div>
                        </div>
                        <div class="col-auto">
                            <i class='far fa-file-alt fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Notaris -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Notaris
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $notaris ?></div>
                        </div>
                        <div class="col-auto">
                            <i class='fas fa-book fa-2x text-gray-300'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->