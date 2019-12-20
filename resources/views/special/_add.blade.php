<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Special Event
		</h3>
	</div>
	<form action="{{route('special.store')}}" method="post">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Name</label>
				<span class="text-red">*</span>
				<input type="text" id="name" class="form-control" placeholder="Name" value="{{old('name')}}" name="name" required="" onchange="autoCompleteURL(this,'url')" onkeypress="autoCompleteURL(this,'url')" >
				@error('name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="slug">URL</label>
				<span class="text-red">*</span>
				<input type="text" id="url" class="form-control" placeholder="URL" value="{{old('slug')}}" name="slug" required="" >
				@error('slug')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" placeholder="Description" rows="3">{{old('description')}}</textarea>
			</div>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">New special</button>
		</div>
	</form>
</div>
