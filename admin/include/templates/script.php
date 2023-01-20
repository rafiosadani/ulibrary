<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="assets/demo/datatables-demo.js"></script> -->

<!-- Datepicker -->
<script src="assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>

<!-- Bootstrap Select -->
<link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- datepicker -->
<script>
    // date picker
    $('#datepicker-year').datepicker({
        format: "yyyy",
        orientation: "top auto",
        viewMode: "years", 
        minViewMode: "years",
        autoclose: true
    });

    // date picker
    $('#datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        orientation: "top auto",
        // viewMode: "years", 
        // minViewMode: "years",
        autoclose: true
    });

    // date picker
    $('#datepicker-date2').datepicker({
        format: "yyyy-mm-dd",
        orientation: "top auto",
        // viewMode: "years", 
        // minViewMode: "years",
        autoclose: true
    });
</script>

<script>
    $(document).ready(() => {
        $("#customFile").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#preview-img").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<script>
    $(document).ready(function(){

    var count = 0;

    function add_input_field(count) {

        var html = '';

        html += '<tr>';

        html += '<td><select name="judul[]" class="form-control selectpicker" data-live-search="true"><option value="">-- Pilih Buku --</option><?php echo fill_unit_select_box($koneksi); ?></select></td>';

        html += '<td><input type="number" name="jumlah_buku[]" class="form-control item_quantity" /></td>';

        var remove_button = '';

        if(count > 0) {
            remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
        }

        html += '<td class="text-center align-middle">'+remove_button+'</td></tr>';

        return html;

    }

    $('#item_table').append(add_input_field(0));

    $('.selectpicker').selectpicker('refresh');

    $(document).on('click', '.add', function () {

        count++;

        $('#item_table').append(add_input_field(count));

        $('.selectpicker').selectpicker('refresh');

    });

    $(document).on('click', '.remove', function(){

        $(this).closest('tr').remove();

    });

    // $("#tambah_peminjaman").submit(function(e) {
    //     e.preventDefault();
    //     $("#btn-simpan").val('Menyimpan data...');
    //     $.ajax({
    //         url: 'index.php?include=konfirmasi-tambah-peminjaman',
    //         method: 'post',
    //         data: $(this).serialize(),
    //         success: function(response) {
    //             console.log(response);
    //         }
    //     })
    // });
});
</script>