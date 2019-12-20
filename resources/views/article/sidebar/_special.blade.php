<div class="card card-wiget">
	<div class="card-header">
		<p>Special</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			
            <select class="select2"  data-placeholder="Select related event" style="width: 100%;">
                    @foreach($specials as $post)
						<option value="{{$post->id}}">{{$post->name}}</option>
                    @endforeach
            </select>
		</div>
	</div>
</div>