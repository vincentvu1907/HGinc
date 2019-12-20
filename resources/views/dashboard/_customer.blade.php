<div class="card card-wiget">
	<div class="card-header">
		<h4>Customer</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($customers as $customer): ?>
				<tr>
					<td>{{$customer->name}}</td>
					<td>{{$customer->email}}</td>
					<td>
						@if($customer->password)
							<span class="text-success">Avtive</span>
						@else
							<span class="text-danger">NonActive</span>
						@endif
					</td>
					<td>
						<button  class="btn btn-success" data-id="{{$customer->id}}" onclick="submit(this)">reports</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
	</div>
	<div class="card-footer">
		{{$customers->render()}}
	</div>
</div>
<div class="modal fade2" id="share-modal">
      <div class="modal-dialog h-100 d-flex flex-column justify-content-center my-0">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header text-center">
            <h4 class="modal-title ft-archer" style="width:100%;text-align:center">Social Sharing</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
           	<div class="table-responsive">
           		<table class="table talbe-hover">
           			<thead>
           				<tr>
           					<th>Created_at</th>
           					<th>Message</th>
           					<th></th>
           				</tr>
           			</thead>
           			<tbody class="reports">
           				
           			</tbody>
           		</table>
           	</div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@section("js")
<script>
	function submit(t){
		let id =parseInt($(t).attr('data-id').trim());
		let _token = "{{csrf_token()}}"
		$.ajax({
			url: "{{route('reports')}}",
			type: 'POST',
			dataType: 'json',
			data: {id,_token},
			success:function(data){
				$(".reports").html("")
				data.reports.forEach((val,index)=>{
					let tr = "<tr>"
					tr+=`
						<td>${val.created_at}</td>
						<td>${val.report}</td>
						<td></td>
					`
					tr+="</tr>" 
					$(".reports").append(tr)
					$("#share-modal").modal('show')
				})
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
</script>
@endsection