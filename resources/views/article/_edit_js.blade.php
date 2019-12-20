@include("article._js")
<script src="{{asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin-lte/plugins/toastr/toastr.min.js')}}"></script>
@if(Session::has('msg'))
<script>
	const Toast = Swal.mixin({
      toast: true,
      position: 'center-center',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        type: 'success',
        title: 'Article saved !! '
      })
</script>
@endif