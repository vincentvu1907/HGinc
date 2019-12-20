@section("js")
<script>
	$("#check-all").change(function(event) {
		if ($(this).is(':checked')) {
			$(".choose_cate").prop('checked', true)
		}else{
			$(".choose_cate").prop('checked', false)
		}
	});
</script>
@endsection