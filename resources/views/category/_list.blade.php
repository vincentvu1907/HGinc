
<form action="{{route('category.action')}}" method="post">
	@csrf
	<div class="card card-wiget">
		<div class="card-header">
			<h3 class="card-title">
				List Category
			</h3>
			<hr>
			<select name="action" >
				<option value="">Bulk action</option>
				<option value="unsticky">unsticky</option>
				<option value="sticky">sticky</option>
			</select>
			<button class="btn btn-default">Apply</button>
		</div>
		<div class="table-responsive">

			<table class="table table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" id="check-all" ></th>
						<th>Name</th>
						<th>URL</th>
						<th>Parent</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)

					<tr>
						<td><input type="checkbox" value="{{$category->id}}" name="choose_cate[]" class="choose_cate"></td>
						<td>
							{{$category->name}}@if($category->sticky==1) <b>(sticky <span class="fa fa-star" style="color: yellow"></span>)</b>@endif
							<br>
							<a href="{{route('category.edit',$category->id)}}">Edit</a> | 
							<a href="#" class="quick-btn">Quick edit</a> | 
							<a href="">View</a>
						</td>

						<td>
							{{$category->url}}
						</td>
						<td>
							{{$category->parent_category_id!=""?$category->category_parent($category->parent_category_id)->name:"none"}}
						</td>
						<td>
							@if($category->id>6)
							<form action="{{route('category.delete',$category->id)}}" method="post">
								@csrf
								<button onclick="return confirm('Are you sure ?')" class="btn btn-danger">
									<span class="fa fa-trash"></span>
								</button>
							</form>
							@else
							<span>Disable</span>
							@endif

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
					{{$categories->render()}}
				</div>
			</div>
		</div>
	</div>
</form>