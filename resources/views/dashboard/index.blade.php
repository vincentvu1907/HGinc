@extends("layouts.app")
@section("css")

@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>DASHBOARD</h1>
			</div>
			
		</div>
	</div>
</section>
<section class="content">
	<div class="row justify-content-center">
		<div class="col-md-6">
			@include("dashboard._customer")
		</div>
		<div class="col-md-6">
			@include("dashboard._report")
		</div>
	</div>
</section>
@endsection
