<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
  var options = {
    filebrowserImageBrowseUrl: '/file-manager?type=Images',
    filebrowserImageUploadUrl: '/file-manager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/file-manager?type=Files',
    filebrowserUploadUrl: '/file-manager/upload?type=Files&_token='
  };
</script>
<script>
CKEDITOR.replace('content', options);
</script>
<script>
	$(document).ready(function() {
		$('.select2').select2()

	    //Initialize Select2 Elements
	    // $('.select2bs4').select2({
	    // 	theme: 'bootstrap4'
	    // })
	    $("#input-url").change(function(event) {
	    	$("span.url").text($(this).val());
	    });
	    
	});
</script>
<!-- Thumbnail -->
<script>
	$("#thumbnail").change(function(event) {
		getImageEvent(event,function(e,val,index){
			$("#preview-thumbnail").html(`<img src=${e.target.result} width='100%' />`)
		});
	});
</script>
<!-- Tag -->
<script>
	var count = 0;
	$("#add-tag").click(function(event) {
		var tag = $("#tag").val();
		if (tag.trim()!=="" && sampleValueTag(".list-tag",tag)) {
			appendInput("#array-tag",tag);
			$("#tag").val("")
		}
	});
	function appendInput(dom,value)
	{
		$(dom).append(`<input type="text" class='list-tag' name="tag[]" value='${value}'/>`);
		appendList("#list-tag",value);
	}
	function appendList(dom,value)
	{
		$(dom).append(`<li>${value}<span onclick='destroyTag(this)' class='fa fa-times'></span></li>`);
	}
	function sampleValueTag(dom,value)
	{
		var tag_dom = $(dom);
		for(let i=0;i<tag_dom.length;i++){
			if(tag_dom.eq(i).val().toLowerCase().trim()===value.toLowerCase().trim()){
				return false
			}
		}
		return true
	}
	function deleteValueTag(dom,value){
		var tag_dom = $(dom);
		for(let i=0;i<tag_dom.length;i++){
			if(tag_dom.eq(i).val().toLowerCase().trim()===value.toLowerCase().trim()){
				tag_dom.remove();
			}
		}
	}
	function destroyTag(this_){
		deleteValueTag(".list-tag",$(this_).parent().text());
		$(this_).parent().remove();
	}
	$("#tag").keypress(function(event) {
		tag = $(this).val().trim().toLowerCase();
		if (tag!=="") {
			$.ajax({
			url: "{{route('tag.suggest')}}",
			type: 'POST',
			dataType: 'json',
			data: {_token: "{{csrf_token()}}",tag},
			success:function(data){
				$("#suggest-tag").css("display","block");
				$("#suggest-tag").html("");
				var li = "";
				data.tag.forEach(function(val,index){
					li+=`<li onclick="choosedTag('${val.name}')"">${val.name}</li>`
				});
				$("#suggest-tag").append(li);
			}
		})
		
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		}
		
	});
	function choosedTag(val)
	{
		$("#tag").val(val);
		$("#suggest-tag").css('display', 'none');
	}
</script>
