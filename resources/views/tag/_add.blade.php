<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Create author
		</h3>
	</div>
	<form action="{{route('author.store')}}" method="post">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Name</label>
				<span class="text-red">*</span>
				<input type="text" id="name" class="form-control" placeholder="Name" value="{{old('name')}}" name="name" required="" >
				@error('name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>

		</div>
	</form>
</div>
