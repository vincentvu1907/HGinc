<?php  
namespace App\Repositories\Tags;

use App\Repositories\Tags\TagRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * 
 */
class TagRepository extends BaseRepository implements TagRepositoryInterface
{
	public function getModel()
	{
		return \App\Tag::class;
	}
	public function exists($value)
	{
		return count($this->model->where('name',strtolower($value))->get())!=0?true:false;
	}
	public function searchByName($value)
	{
		return $this->model->where("name",strtolower($value))->first()->id;
	}

}