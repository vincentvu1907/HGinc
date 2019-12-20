<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Create tag
		</h3>
	</div>
	<form action="{{route('config.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="title">Title</label>
				<span class="text-red">*</span>
				<input type="text" id="title" class="form-control" placeholder="Title" value="{{$config->title}}" name="title" required="" >
				@error('title')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" placeholder="Description" rows="3">{{$config->description}}</textarea>
				@error('description')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="quote">Quote</label>
				<input class="form-control" type="text" name="quote" id="quote" placeholder="quote " value="{{$config->quote}}" />
				@error('quote')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="url">URL</label>
				<span class="text-red">*</span>
				<input type="text" id="url" class="form-control" placeholder="URL" value="{{$config->url}}" name="url" required="" >
				@error('url')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="banner">Banner</label>
				<input type="file" name="banner" id="banner" placeholder="banner " />
				@error('banner')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			<div class="form-group">
				<label for="special">Event</label>
				<select name="special_id"  id="" required="" class="form-control">
					<option value="">Choose a event</option>
					@foreach($special as $s)
						<option @if($choose->id==$s->id) selected="true" @endif value="{{$s->id}}">{{$s->name}}</option>
					@endforeach
				</select>
				@error('special')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}"</strong>
				    </span>
				 @enderror
			</div>
			

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Edit</button>
		</div>
	</form>
</div>
