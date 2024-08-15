<!-- plugins:js -->
<script src="{{ asset('admin-assets') }}/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin-assets') }}/assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('admin-assets') }}/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin-assets') }}/assets/js/off-canvas.js"></script>
<script src="{{ asset('admin-assets') }}/assets/js/hoverable-collapse.js"></script>
<script src="{{ asset('admin-assets') }}/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admin-assets') }}/assets/js/dashboard.js"></script>
<script src="{{asset('web/js/toastr.min.js')}}"></script>
<!-- End custom js for this page -->

<script>

  @if(Session::has('success'))

toastr.options =

{

  "closeButton" : true,

  "progressBar" : true,

  "debug": false,

  "positionClass": "toast-bottom-right",

}

    toastr.success("{{ session('success') }}");

@endif

  @if(Session::has('error'))

  toastr.options =

  {

  	"closeButton" : true,

  	"progressBar" : true,

  	"debug": false,

  	"positionClass": "toast-bottom-right",

  }

  		toastr.error("{{ session('error') }}");

  @endif



  @if(Session::has('info'))

  toastr.options =

  {

  	"closeButton" : true,

  	"progressBar" : true,

  	"debug": false,

  	"positionClass": "toast-bottom-right",

  }

  		toastr.info("{{ session('info') }}");

  @endif



  @if(Session::has('warning'))

  toastr.options =

  {

  	"closeButton" : true,

  	"progressBar" : true,

  	"debug": false,

  	"positionClass": "toast-bottom-right",

  }

  		toastr.warning("{{ session('warning') }}");

  @endif
</script>
