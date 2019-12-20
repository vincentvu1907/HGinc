@extends("layouts.app")

@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Product</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{route('product.all') }}">product</a></li>
					<li class="breadcrumb-item active">{{$product->name}}</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<div class="row justify-content-center">
	<div class="col-md-7">
		<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card card-wiget">
				<div class="card-header">
					<h3>Edit product</h3>
				</div>
				<div class="card-body">

						<div class="form-group">
							<label for="name">Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$product->name }}" required="">
							@error('name')
							<span class="invalid-feedback">
								{{$message}}
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="affilate_link">Oversea link</label>
							<input type="text" class="form-control" name="affilate_link" id="affilate_link" placeholder="Link" value="{{$product->affilate_link }}" required="">
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
									<input type="number" class="form-control" name="price" id="price" placeholder="Price" value="{{$product->price }}" required=""> 
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
									<input type="file" name="image" id="image"> 
									@error('image')
									<span class="invalid-feedback">
										{{$message}}
									</span>
									@enderror
									<br>
									<div id="preview-image">
											<img src="{{asset('upload/products/'.$product->image)}}" width="150px" alt="">
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
							<textarea class="form-control" name="description" id="description" placeholder="Description" rows="4">{{$product->description }}</textarea>
						</div>

					
				</div>
				<div class="card-footer textright">
					<button class=" btn btn-primary" type="submit">Update</button>
				</div>
			</div>
			</form>

	</div>
</div>
@endsection