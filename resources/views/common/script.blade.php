
  
  <script src="{{ asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js')}}"></script>
  <script src="{{ asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('js/template.js')}}"></script>
  <script src="{{ asset('js/settings.js')}}"></script>
  <script src="{{ asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js')}}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.js')}}"></script>
  
  
  <!-- data table online js -->
  <script src="{{ 'https://code.jquery.com/jquery-3.5.1.js' }}"></script>
  <script src="{{ 'https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js' }}"></script>
  <script src="{{ 'https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js' }}"></script>
  <script src="{{ 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js' }}"></script>
  <script src="{{ 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js' }}"></script>
  <script src="{{ 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js' }}"></script>
  <script src="{{ 'https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js' }}"></script>
  


  <script>

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

  </script>


  