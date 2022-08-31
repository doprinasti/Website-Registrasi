<!-- Footer -->
<footer class="sticky-footer-sm bg-white fixed-bottom">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Pengadilan Negeri Sleman 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda Yakin Ingin Keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary ml-5" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-primary" href="<?php echo base_url('welcome/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

<script scr="https://code.jquery.com/jquery-3.5.1.js"></script>
<script scr="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script scr="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
</body>

</html>