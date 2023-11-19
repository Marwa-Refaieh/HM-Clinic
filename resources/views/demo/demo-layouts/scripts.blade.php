@yield('script')
  <script src="{{ URL::asset('demo/js/particles.min.js') }}"></script>
  <script src="{{ URL::asset('demo/js/app.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('demo/js/main.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('demo/js/nav.js') }}"></script>
  <script src="{{ URL::asset('demo/js/footer.js') }}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
      toastr.options.progressBar = true;
      toastr.options = {
          positionClass: 'toast-top-center'
      };
  </script>
