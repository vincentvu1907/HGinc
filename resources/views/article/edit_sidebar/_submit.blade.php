
<div class="card">
	<div class="card-header">
		<p>Publish</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			<label for="status" style="margin-right: 20px">Status</label>     
			<select name="status" id="status">
				<option @if($post->status=='draft') selected="true" @endif value="draft">Draft</option>
				<option @if($post->status=='publish') selected="true" @endif   value="publish">Publish</option>
			</select>
		</div>
		<div class="form-group">
			<label for="author_id" style="margin-right: 20px">Author</label>     
			<select name="author_id" id="author_id">
				@foreach($authors as $author)
					<option @if($author->id==$post->author_id) selected="true" @endif  value="{{$author->id}}">{{$author->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="sticky" style="margin-right: 20px">Sticky</label>     
			<select name="sticky" id="sticky">
				<option @if($post->sticky=='0') selected="true" @endif value="0" >unsticky</option>
				<option @if($post->sticky=='1') selected="true" @endif   value="1">sticky</option>
			</select>
		</div>
		<div class="form-group">
			<label for="category_id">Category</label>
			<select name="category_id[]" id="category_id" multiple="multiple" class="select2" data-placeholder="Choose a category"  style="width:100%">
				<?php $post_category = $post->categories;$post_special = $post->specials;?>

			@foreach($categories as $category)
				@foreach($post_category as $cate)
					<option @if($cate->id==$category->id) selected="true" @endif  value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="special">Event</label>
			<select name="special_id" multiple="" class="select2" id="special"  data-placeholder="Choose a event" style="width:100%">

			@foreach($specials as $s)
				@foreach($post_special as $ps)
					<option @if($ps->id==$s->id) selected="true" @endif value="{{$s->id}}">{{$s->name}}</option>
				@endforeach
				@if(count($post_special)==0)
				<option value="{{$s->id}}">{{$s->name}}</option>
				@endif
            @endforeach
			</select>
		</div>
		<div class="text-right">
			<button class="btn btn-primary">Submit</button>
		</div>
	</div>
</div>