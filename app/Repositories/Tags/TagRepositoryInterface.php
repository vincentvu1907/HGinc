<?php  
namespace App\Repositories\Tags;


interface TagRepositoryInterface{
	public function exists($value);
	public function searchByName($value);
}