<?php  
namespace App\Repositories\Products;

use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * 
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
	public function getModel()
	{
		return \App\Product::class;
	}
}