<div class="card card-wiget">
	<div class="card-header">
		<h3 class="card-title">
			Detail
		</h3>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<td><b>Title</b></td>
					<td>{{$config->title}}</td>
				</tr>
				<tr>
					<td><b>Description</b></td>
					<td>{{$config->description}}</td>
				</tr>
				<tr>
					<td><b>Quote</b></td>
					<td>{{$config->quote}}</td>
				</tr>
				<tr>
					<td><b>URL</b></td>
					<td>{{$config->url}}</td>
				</tr>
				<tr>
					<td><b>Event</b></td>
					<td>{{$choose->name}}</td>
				</tr>
				<tr>
					<td><b>Banner</b></td>
					<td>
						<img src="{{asset('upload/homepage/'.$config->banner)}}" width="100%" alt="">
					</td>
				</tr>
				
			</table>
		</div>
	</div>
	<div class="card-footer">
		<a href=""><span class="fa fa-edit"></span></a>
	</div>
</div>
