<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			List author
		</h3>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Name</th>
					<th>View</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($authors as $author)

				<tr>
					
					<td>
						{{$author->name}}
						<br>
						<a href="{{route('author.edit',$author->id)}}">Edit</a> | 
						<a href="#" class="quick-btn">Quick edit</a> | 
					</td>
					<td>
						<a href="{{parsePageURL($author->url)}}" class="btn btn-success">
							<span class="fa fa-eye"></span>
						</a>
					</td>
					<td>
						{{$author->description}}
					</td>
					<td>
						<form action="{{route('author.delete',$author->id)}}" method="post">
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
				{{$authors->render()}}
			</div>
		</div>
	</div>
</div>