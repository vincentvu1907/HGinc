@extends("layouts.app")

@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>tag</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{route('tag.all')}}">tag</a></li>
					<li class="breadcrumb-item active">{{$tag->name}}</li>
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
					Edit tag
				</h3>
			</div>
			<form action="{{route('tag.update',$tag->id)}}" method="post">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="name">Name</label>
						<span class="text-red">*</span>
						<input type="text" id="name" class="form-control" value="{{$tag->name}}" name="name" placeholder="Name">
						@error('name')
				        <span class="invalid-feedback" role="alert">
				            <strong>{{ $message }} : "{{old('name')}}"</strong>
				        </span>
				        @enderror
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update tag</button>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection