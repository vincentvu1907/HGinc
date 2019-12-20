<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			List Specials
		</h3>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Name</th>
					<th>Url</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($specials as $special)

				<tr>
					
					<td>
						{{$special->name}}
						<br>
						<a href="{{route('special.edit',$special->id)}}">Edit</a> | 
						<a href="#" class="quick-btn">Quick edit</a> | 
					</td>
					<td>
						{{$special->slug}}
					</td>
					<td>
						{{$special->description}}
					</td>
					<td>
						<form action="{{route('special.delete',$special->id)}}" method="post">
							@csrf
							<button class="btn btn-danger">
								<span class="fa fa-trash"></span>
							</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-5"></div>
		<div class="col-sm-12 col-md-7">
			<div class="dataTables_paginate paging_simple_numbers">
				{{$specials->render()}}
			</div>
		</div>
	</div>
</div>