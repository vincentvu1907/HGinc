<div class="card card-wiget">
	<div class="card-header">
		<p>Thumbnail</p>
	</div>
	<div class="card-body">
		@error("thumbnail")
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
		@enderror
		<div class="form-group">
			<input type="file" accept="image/*" id="thumbnail" name="thumbnail" />
		</div>
		<div class="form-group">
			<div id="preview-thumbnail">
				<img src="{{asset('upload/posts/'.$post->thumbnail)}}" width="100%" alt="">
			</div>
		</div>
	</div>
</div>