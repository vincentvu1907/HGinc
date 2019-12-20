@extends("layouts.app")
@section('css')
<style>
	td#tags ul{
		padding: 0px;
	}
	td#tags ul li {
		display: inline-block;
		padding: 3px 5px;
		background: #343a40;
		color: #fff;
		margin: 2px 4px;
		border-radius: 8px;
	}
</style>
@endsection
@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Article</h1>
				<hr>
				<a href="{{route('article.new')}}" class="btn btn-default">Add new</a>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Article</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content bg-white">
	<form action="{{route('article.action')}}" method="post">
		@csrf
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-3">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<select name="action" id="">
										<option value="">Bulk Action</option>
										<option value="draft">Draft</option>
										<option value="publish">Publish</option>
										<option value="unsticky">Unsticky</option>
										<option value="sticky">Sticky</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-default" type="submit">Apply</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th><input type="checkbox" id="check-all" ></th>
								<th>Title</th>
								<th>Url</th>
								<th>Tags</th>
								<th>Author</th>
								<th>Status</th>
								
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
							<tr @if($post->status=='draft') class="bg-dark" @endif >
								<td>
									<input type="checkbox" value="{{$post->id}}" name="choose_post[]" class=" choose_post">
								</td>
								<td>{{$post->title}}@if($post->sticky==1) <b>(sticky <span class="fa fa-star" style="color: yellow"></span>)</b> @endif
									<br>
									<a href="{{route('article.edit',$post->id)}}">Edit</a>
								</td>
								<td>{{$post->url}}</td>
								<td id="tags">{!!arrayToList($post->tags)!!}</td>
								<td>{{$post->author->name}}</td>
								<td>{{$post->status}}</td>
								
								<td>
									<form action="{{route('article.delete',$post->id)}}" method="post">
										@csrf
										<button class="btn btn-danger">
											<span class="fa fa-trash"></span>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer">
				{{$posts->render()}}
			</div>
		</div>
	</form>
</section>
@endsection
@section("js")
<script>
	$("#check-all").change(function(event) {
		if ($(this).is(':checked')) {
			$(".choose_post").prop('checked', true)
		}else{
			$(".choose_post").prop('checked', false)
		}
	});
</script>
@endsection