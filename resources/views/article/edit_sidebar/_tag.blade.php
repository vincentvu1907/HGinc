<div class="card card-wiget">
	<div class="card-header">
		<p>Tags</p>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-9">
				<input type="text" id="tag" class="form-control" placeholder="Tags" autocomplete="off">
				<ul id="suggest-tag">
					
				</ul>
				<div id="array-tag" style="display: none">
					
					@foreach($tags as $tag)
						<input type="text" name="tag[]" value="{{$tag->name}}">
					@endforeach
				
				</div>
			</div>
			<div class="col-sm-3">
				<button id="add-tag" type="button" class="btn btn-default btn-sm">add</button>
			</div>
		</div>
		<div class="row just-content-center">
			<div class="col-md-12">
				<ul id="list-tag">
					@foreach($tags as $tag)
					<li>{{$tag->name}}<span onclick='destroyTag(this)' class='fa fa-times'></span></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
