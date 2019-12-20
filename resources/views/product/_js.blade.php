<script>
	$("#image").change(function(event) {
		getImageEvent(event,function(e,val,index){
			$("#preview-image").html(`<img src=${e.target.result} width='100px' />`)
		});
	});
</script>