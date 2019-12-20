<?php  
namespace App\Repositories\Customers;


interface CustomerRepositoryInterface{
	public function isExist($email);
}