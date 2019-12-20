<?php
namespace App\Repositories\Posts;

use  App\Repositories\Posts\PostRepositoryInterface;
use  App\Repositories\BaseRepository;
/**
 * 
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
	public function getModel()
	{
		return \App\Post::class;
	}
	public function getByURL($slug){
		return $this->model->where("url",$slug)->first();
	}
	public function hasSticky()
	{
		return count($this->model->where("sticky","1")->get)==0?false:true;
	}
	public function getPostSticky()
	{
		return $this->model->where("sticky","1")->orderBy("id","DESC")->select('id','title','description','url','thumbnail')->first();
	}
	public function getLastest($ignore){
		return $this->model->where("id","<>",$ignore)->orderBy("id","DESC")->select('id','title','url','thumbnail')->take(5)->get();
	}
}