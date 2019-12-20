@extends("layouts.app")
@section("css")

@endsection
@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Tag</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">tag</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row justify-content-center">
		<div class="col-md-6">
			@include("tag._add")
		</div>
		<div class="col-md-6">
			@include("tag._list")
		</div>
	</div>
</section>
@endsection
@section("js")
	@include("tag._js")
@endsection