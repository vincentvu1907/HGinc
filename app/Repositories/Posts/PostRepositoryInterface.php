<?php 
namespace App\Repositories\Posts;

interface PostRepositoryInterface{
	public function getByURL($slug);
	public function hasSticky();
	public function getPostSticky();
	public function getLastest($ignore);
}