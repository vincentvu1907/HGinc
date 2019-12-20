@extends("layouts.app")
@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Products</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">product</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card card-wiget">
				<div class="card-header">
					<h3>Create product</h3>
				</div>
				<div class="card-body">

						<div class="form-group">
							<label for="name">Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" required="">
							@error('name')
							<span class="invalid-feedback">
								{{$message}}
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="affilate_link">Oversea link</label>
							<input type="text" class="form-control" name="affilate_link" id="affilate_link" placeholder="Link" value="{{old('affilate_link')}}" required="">
							@error('affilate_link')
							<span class="invalid-feedback">
								{{$message}}
							</span>
							@enderror
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="price">Price $</label>
									<input type="number" class="form-control" name="price" id="price" placeholder="Price" value="{{old('price')}}" required=""> 
									@error('price')
									<span class="invalid-feedback">
										{{$message}}
									</span>
									@enderror
								</div>
							</div>
							<div>
								<div class="form-group">
									<label for="image">Image</label>
									<br>
									<input type="file" name="image" id="image"required=""> 
									@error('image')
									<span class="invalid-feedback">
										{{$message}}
									</span>
									@enderror
									<div id="preview-image">

									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="description">Description</label>

							@error('description')
							<span class="invalid-feedback">
								{{$message}}
							</span>
							@enderror
							<textarea class="form-control" name="description" id="description" placeholder="Description" rows="4">{{old('description')}}</textarea>
						</div>

					
				</div>
				<div class="card-footer textright">
					<button class=" btn btn-primary" type="submit">Add new</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</section>
@endsection
@section('js')
@include('product._js')
@endsection