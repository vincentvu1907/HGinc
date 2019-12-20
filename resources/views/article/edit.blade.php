@extends("layouts.app")

@section("css")
	@include("article._edit_css")
@endsection

@section("content")
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Article</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{route('article.all')}}">Article</a></li><li class="breadcrumb-item">{{$post->title}}</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form action="{{route('article.update',$post->id)}}" enctype="multipart/form-data" method="post">
		@csrf
		<div class="row justify-content-center">
			<div class="col-md-9">
				@include("article._edit_builder")
			</div>
			<div class="col-md-3">
				@include("article._edit_sidebar")
			</div>
		</div>
	</form>
</section>
@endsection
@section("js")
@include("article._edit_js")
@endsection