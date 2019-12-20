<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Helpers\FileAdapter;
class ProductController extends Controller
{
	use FileAdapter;
	protected $product;
	public function __construct(ProductRepositoryInterface $product)
	{
		$this->product = $product;
		$this->setPath("upload/products");
	}    
	public function getAll()
	{
		return view('product.all',[
			'products'=>$this->product->paginate(1),
		]);
	}
	public function getNew()
	{
		return view('product.add');
	}
	public function store(ProductRequest $request)
	{
		$request->validated();
		$product_current = $this->product->create($request->all());
		$product_current->image = $this->uploadAdapter($request->file('image'));
		$product_current->save();
		return redirect(route('product.all'));
	}
	public function destroy(Request $request,$id)
	{
		$product = $this->product->find($id);
		$this->deleteFile($product->image);
		$product->delete();
		return redirect(route('product.all'));
	}
	public function getEdit($id){
		return view('product.edit',[
			"product"=>$this->product->find($id)
		]);
	}
	public function update(Request $request,$id){
		$request->validate([
			"name"=>"required",
		]);
		$product = $this->product->find($id);
		$product->update($request->only('name','description','price','affilate_link'));
		if (isset($request->image)) {
			$image = $this->uploadAdapter($request->file('image'));
			$this->deleteFile($product->image);
			$product->image = $image;
			$product->save();
		}
		return redirect(route('product.all'));
	}
}
