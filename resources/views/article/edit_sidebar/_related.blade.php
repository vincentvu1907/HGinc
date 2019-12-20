<div class="card card-wiget">
	<div class="card-header">
		<p>Related posts</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			
            <select class="select2" multiple="multiple" data-placeholder="Select related posts" style="width: 100%;">
                    @foreach($posts as $post)
						<option value="{{$post->id}}">{{$post->title}}</option>
                    @endforeach
            </select>
		</div>
	</div>
</div>