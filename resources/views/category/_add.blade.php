<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Create Category
		</h3>
	</div>
	<form action="{{route('category.store')}}" method="post">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Name</label>
				<span class="text-red">*</span>
				<input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{old('name')}}" required="" onchange="autoCompleteURL(this,'url')" onkeypress="autoCompleteURL(this,'url')">
				@error('name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="url">URL</label>
				<span class="text-red">*</span>
				<input type="text" id="url" class="form-control" placeholder="URL" value="{{old('url')}}" name="url" required="">
				@error('url')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="parent_category_id">Parent</label>
				<br>
				<select name="parent_category_id" id="parent_category_id" >
					<option value="" selected="true">None</option>
					@foreach($category_all_name as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				
			</div>
			<div class="form-group">
				<label for="Description">Description</label>
				<textarea placeholder="description "  rows="3" class="form-control" name="description" id="description"></textarea>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">New category</button>
		</div>
	</form>
</div>
