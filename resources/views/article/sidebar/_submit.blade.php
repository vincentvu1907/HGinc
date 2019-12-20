<div class="card">
	<div class="card-header">
		<p>Publish</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			<label for="status" style="margin-right: 20px">Status</label>     
			<select name="status" id="status">
				<option value="draft" selected="true">Draft</option>
				<option value="publish">Publish</option>
			</select>
		</div>
		<div class="form-group">
			<label for="author_id" style="margin-right: 20px">Author</label>     
			<select name="author_id" id="author_id">
				@foreach($authors as $author)
					<option value="{{$author->id}}">{{$author->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="sticky" style="margin-right: 20px">Sticky</label>     
			<select name="sticky" id="sticky">
				<option value="0" selected="true">unsticky</option>
				<option value="1">sticky</option>
			</select>
		</div>
		<div class="form-group">
			<label for="category_id">Category</label>
			<select name="category_id[]" id="category_id" multiple="multiple" class="select2" data-placeholder="Choose a category"  style="width:100%">
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="special">Event</label>
			<select name="special_id" multiple="" class="select2" id="special"  data-placeholder="Choose a event" style="width:100%">
			@foreach($specials as $s)
				<option value="{{$s->id}}">{{$s->name}}</option>
            @endforeach
			</select>
		</div>
		<div class="text-right">
			<button class="btn btn-primary">Submit</button>
		</div>
	</div>
</div>