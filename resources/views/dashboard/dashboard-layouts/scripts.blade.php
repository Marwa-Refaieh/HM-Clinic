  <!--   Core JS Files   -->
  {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
  {{-- <script src="{{ URL::asset('dashboard/assets/js/fontawesome.min.js') }}"></script> --}}

  <script src="{{ URL::asset('dashboard/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/assets/js/core/bootstrap-material-design.min.js') }}"></script>


  <script src="{{ URL::asset('dashboard/assets/js/plugins/index.umd.js') }}"></script>
  <script src="{{ URL::asset('dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="{{ URL::asset('dashboard/assets/js/buttons.js') }}"></script>
  <!-- Chartist JS -->
  <script src="{{ URL::asset('dashboard/assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ URL::asset('dashboard/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset('dashboard/assets/js/material-dashboard.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
      toastr.options.progressBar = true;
      toastr.options = {
          positionClass: 'toast-top-center'
      };
  </script>
{{-- <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script> --}}

  <!-- Table -->
  {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
  <script src="{{ URL::asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="{{ URL::asset('dashboard/assets/js/bootstrap-table.min.js') }}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ URL::asset('dashboard/assets/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('dashboard/assets/js/main.js') }}"></script>
