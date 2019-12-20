<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Customers\CustomerRepositoryInterface;
class DashboardController extends Controller
{
    protected $customer;
	public function __construct(CustomerRepositoryInterface $customer)
	{
		$this->customer = $customer;
	}
	public function index()
	{
		return view("dashboard.index",[
			"customers"=>$this->customer->paginate(15),

		]);
	}
	public function reports(Request $request)
	{
		$request->validate([
			"id"=>"required"
		]);

		return response()->json([
			"reports"=>$this->customer->find($request->id)->reports
		]);
	}
}
