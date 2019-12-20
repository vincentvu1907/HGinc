<div class="card card-wiget">
	<div class="card-header">
		<p>Related products</p>
	</div>
	<div class="card-body">
		<div class="form-group">
			
            <select class="select2" name="product_id" multiple="multiple" data-placeholder="Select related products" style="width: 100%;">
                    @foreach($products as $product)
						<option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
            </select>
		</div>
	</div>
</div>