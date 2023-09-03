<!-- jQuery -->
<script src="/asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="/asset/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    //   $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="/asset/plugins/moment/moment.min.js"></script>
<script src="/asset/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="/asset/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- overlayScrollbars -->
<script src="/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="/asset/dist/js/adminlte.js"></script>
{{-- <script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js">
</script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="/asset/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="/asset/dist/js/pages/dashboard.js"></script> --}}
<script src="{{ asset('asset/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}'}
    });
</script>
