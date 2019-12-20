@extends("layouts.app")

@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Category</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{route('category.all')}}">Category</a></li>
					<li class="breadcrumb-item active">{{$category->name}}</li>
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
					Edit category
				</h3>
			</div>
			<form action="{{route('category.update',$category->id)}}" method="post">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="name">Name</label>
						<span class="text-red">*</span>
						<input type="text" id="name" class="form-control" value="{{$category->name}}" placeholder="Name" name="name" required="" onchange="autoCompleteURL(this,'url')" onkeypress="autoCompleteURL(this,'url')">
						@error('name')
				        <span class="invalid-feedback" role="alert">
				            <strong>{{ $message }} : "{{old('name')}}"</strong>
				        </span>
				        @enderror
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<span class="text-red">*</span>
						<input type="text" id="url" value="{{$category->url}}" class="form-control" placeholder="URL" name="url" required="">
						@error('url')
				        <span class="invalid-feedback" role="alert">
				            <strong>{{ $message }} : "{{old('url')}}"</strong>
				        </span>
				        @enderror
					</div>
					<div class="form-group">
						<label for="parent_category_id">Parent</label>
						<br>
						<select name="parent_category_id" id="parent_category_id" >
							<option value="">None</option>
							@foreach($category_all_name as $cate)
						
							<option @if($category->parent_category_id==$cate->id) selected='true' @endif value="{{$cate->id}}">{{$cate->name}}</option>
						
							@endforeach

						</select>

					</div>
					<div class="form-group">
						<label for="Description">Description</label>
						<textarea placeholder="description " rows="3" class="form-control" name="description" id="description">{{$category->description}}</textarea>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update category</button>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection