<?php
namespace App\Repositories\Categories;

interface CategoryRepositoryInterface{
	public function getByURL($slug);
	public function getCategoryNaviagtion($total=5);
}