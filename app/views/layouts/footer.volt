<!-- jQuery 3 -->
{{ javascript_include("assets/bower_components/jquery/dist/jquery.min.js") }}
<!-- Bootstrap 3.3.7 -->
{{ javascript_include("assets/bower_components/bootstrap/dist/js/bootstrap.min.js") }}
<!-- DataTables -->
{{ javascript_include("assets/bower_components/datatables.net/js/jquery.dataTables.min.js") }}
{{ javascript_include("assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}
<!-- SlimScroll -->
{{ javascript_include("assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}
<!-- FastClick -->
{{ javascript_include("assets/bower_components/fastclick/lib/fastclick.js") }}
<!-- AdminLTE App -->
{{ javascript_include("assets/dist/js/adminlte.min.js") }}
<!-- AdminLTE for demo purposes -->
{{ javascript_include("assets/dist/js/demo.js") }}

{{ javascript_include("assets/pnotify/pnotify.js") }}
{{ javascript_include("assets/pnotify/pnotify.button.js") }}
{{ javascript_include("assets/pnotify/pnotify.nonblock.js") }}



<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
