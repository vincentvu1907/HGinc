<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			List tag
		</h3>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)

				<tr>
					
					<td>
						{{$tag->name}}
						<br>
						<a href="{{route('tag.edit',$tag->id)}}">Edit</a> | 
						<a href="#" class="quick-btn">Quick edit</a> | 
						<a href="">View</a>
					</td>
					<td>
						<form action="{{route('tag.delete',$tag->id)}}" method="post">
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
				{{$tags->render()}}
			</div>
		</div>
	</div>
</div>