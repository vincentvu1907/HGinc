<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Edit article
		</h3>
	</div>
	<div class="card-body">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" placeholder="Title" required="" value="{{$post->title}}" onchange="autoCompleteURL(this,'url',true)" onkeypress="autoCompleteURL(this,'url',true)" class="form-control">
			@error("title")
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<label for="input-url">URL</label>
			<input type="text" id="input-url" class="url form-control"  name="url" placeholder="URL" required=""  value="{{$post->url}}" class="form-control">
			<p>{{getAppURL()}}/<span class="url" style="color:blue;font-weight: bold;">{{$post->url}}</span></p>
			@error("url")
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="form-group">
			<hr>
			<button onclick="$('#cke_91').click()" class="btn btn-success" type="button"><span class="fa fa-eye"></span></button>
			<hr>
			@error("content")
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<textarea name="content" id="content" rows="40">{{$post->content}}</textarea>
		</div>
	</div>
	<div class="card-footer">
		
	</div>
</div>