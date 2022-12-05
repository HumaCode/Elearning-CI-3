<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Anda ingin Logout.?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda akan Keluar dan Mengakhiri session</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Ya</a>
            </div>
        </div>

    </div>
</div>

<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>


<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap select 2-->
<script src="<?= base_url() ?>assets/vendor/bootstrap-select.js"></script>
<!-- Fancy box -->
<script src="<?= base_url() ?>assets/plugin/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script>
    $(document).ready(function() {
        $('.perbesar').fancybox();
    });
</script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- jQuery custom content scroller -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Datatables -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>



<!-- SweetAlert -->
<script src="<?= base_url() ?>assets/vendor/sweetalert/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sweetalert/js/scriptsaya.js"></script>


<!-- CKEDITOR -->
<script src="<?= base_url() ?>assets/plugin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

<!-- tampilan video -->
<script src="<?= base_url() ?>assets/plugin/video/video.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>assets/vendor/gentelella-master/build/js/custom.min.js"></script>
<script>
    $(document).ready(function() {
        $('.bootstrap-select').selectpicker();

        //GET UPDATE
        $('.update-record').on('click', function() {
            var package_id = $(this).data('package_id');
            var package_name = $(this).data('package_name');
            $(".strings").val('');
            $('#UpdateModal').modal('show');
            $('[name="edit_id"]').val(package_id);
            $('[name="package_edit"]').val(package_name);
            //AJAX REQUEST TO GET SELECTED PRODUCT
            $.ajax({
                url: "<?php echo site_url('package/get_product_by_package'); ?>",
                method: "POST",
                data: {
                    package_id: package_id
                },
                cache: false,
                success: function(data) {
                    var item = data;
                    var val1 = item.replace("[", "");
                    var val2 = val1.replace("]", "");
                    var values = val2;
                    $.each(values.split(","), function(i, e) {
                        $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                        $(".strings").selectpicker('refresh');

                    });
                }

            });
            return false;
        });

        //GET CONFIRM DELETE
        $('.delete-record').on('click', function() {
            var package_id = $(this).data('package_id');
            $('#DeleteModal').modal('show');
            $('[name="delete_id"]').val(package_id);
        });
    });


    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // preview foto
    // menampilkan gambar sebelum di submit
    // custom input
    $(function() {
        bsCustomFileInput.init();
    });

    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFile").change(function() {
        bacaGambar(this);
    });
</script>

</body>

</html>