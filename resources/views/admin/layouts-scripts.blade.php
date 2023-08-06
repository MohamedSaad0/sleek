  <!-- Helpers -->
  <script src="{{ asset('resources/admin/assets/vendor/js/helpers.js') }}"></script>

  <!-- Config - global clrs vars -->
  <script src="{{ asset('resources/admin/assets/js/config.js') }}"></script>


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('resources/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('resources/admin/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('resources/admin/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <script src="{{ asset('resources/admin/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Main JS -->
  <script src="{{ asset('resources/admin/assets/js/main.js') }}
  "></script>
  <script src="{{ asset('resources/assets/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('resources/assets/multiple-image-upload/dist/image-uploader.min.js') }}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script>
      $(document).ready(function() {
          $('.select2').select2();
      });
      $('.input-images').imageUploader();
      $('.input-images-1').imageUploader();
  </script>
