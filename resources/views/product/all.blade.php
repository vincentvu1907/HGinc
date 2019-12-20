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
			<div class="card card-wiget">
				<div class="card-header">
					<h3>List product</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>URL/Oversea</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
									<tr>
										<td><img width="150px;" src="{{asset('upload/products/'.$product->image)}}" alt=""></td>
										<td>{{$product->name}}
										<br>
										<a href="{{route('product.edit',$product->id)}}">Edit</a>
										</td>
										<td>{{$product->affilate_link==''?$product->url:$product->affilate_link}}</td>
										<td>
											<form action="{{route('product.delete',$product->id)}}" method="post">
												@csrf
												<button type="submit" class="btn btn-danger">
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
				<div class="card-footer text-right right">
					{{$products->render()}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js')
@include('product._js')
@endsection