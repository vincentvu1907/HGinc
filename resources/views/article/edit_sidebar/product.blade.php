<div class="card card-wiget">
	<div class="card-header">
		<p>Related products</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			<?php $product_related = $post->products ?>
		
            <select class="select2" name="product_id" multiple="multiple" data-placeholder="Select related products" style="width: 100%;">
                    @foreach($products as $product)
                    	@foreach($product_related as $p)
							<option @if($p->id == $product->id) selected='true' @endif value="{{$product->id}}">{{$product->name}}</option>
                    	@endforeach
                    	@if(count($product_related)==0)
						<option value="{{$product->id}}">{{$product->name}}</option>
						@endif
                    @endforeach
            </select>
		</div>
	</div>
</div>