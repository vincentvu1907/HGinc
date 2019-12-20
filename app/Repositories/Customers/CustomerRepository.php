<?php  
namespace App\Repositories\Customers;

use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * 
 */
class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
	public function getModel()
	{
		return \App\Customer::class;
	}
	public function isExist($email)
	{
		return count($this->model->where("email",$email)->get())==0?false:true;
	}
}