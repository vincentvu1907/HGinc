@extends("layouts.app")
@section("css")

@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Attribute for HomePage</h1>
			</div>
			
		</div>
	</div>
</section>
<section class="content">
	<div class="row justify-content-center">
		<div class="col-md-6">
			@include("config._add")
		</div>
		<div class="col-md-6">
			@include("config._detail")
		</div>
	</div>
</section>
@endsection
@section("js")
	@include("author._js")
@endsection