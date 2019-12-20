@extends("layouts.app")

@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>author</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{route('author.all')}}">author</a></li>
					<li class="breadcrumb-item active">{{$author->name}}</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<div class="row justify-content-center">
	<div class="col-md-7">
		<div class="card card-wiget">
			<div class="card-header">
				<h3 class="card-title">
					Edit author
				</h3>
			</div>
			<form action="{{route('author.update',$author->id)}}" method="post">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="name">Name</label>
						<span class="text-red">*</span>
						<input type="text" id="name" class="form-control" value="{{$author->name}}" name="name" placeholder="Name">
						@error('name')
				        <span class="invalid-feedback" role="alert">
				            <strong>{{ $message }} : "{{old('name')}}"</strong>
				        </span>
				        @enderror
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<span class="text-red">*</span>
						<input type="text" id="url" class="form-control" placeholder="URL" value="{{$author->url}}" name="url" required="" >
						@error('url')
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $message }}"</strong>
						    </span>
						 @enderror
					</div>
					<div class="form-group">
						<label for="backlink">Link author</label>
						<input class="form-control" type="text" name="backlink" id="backlink" placeholder="Link of author " value="{{$author->backlink}}" />
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea name="description" class="form-control" placeholder="Description" rows="3">{{$author->description}}</textarea>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update author</button>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection