<?php

namespace App\Http\Controllers\Avision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Report;
class CustomerController extends Controller
{
	protected $customer;
	public function __construct(CustomerRepositoryInterface $customer)
	{
		$this->customer = $customer;
	}
	public function reporting(Request $request)
	{
		$request->validate([
			"name"=>"required",
			"email"=>"required",
			"report"=>"required"
		]);
		if ($this->customer->isExist($request->email)) {
			$customer = $this->customer->where("email","=",$request->email)[0];
			Report::create([
			"report"=>$request->report,
			"customer_id"=>$customer->id,
		]);
			return ;
		}
		$customer = $this->customer->create($request->all());
		Report::create([
			"report"=>$request->report,
			"customer_id"=>$customer->id,
		]);
		return ;

	}    
}
