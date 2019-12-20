<?php
namespace App\Repositories\Categories;

use  App\Repositories\Categories\CategoryRepositoryInterface;
use  App\Repositories\BaseRepository;
/**
 * 
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
	public function getModel()
	{
		return \App\Category::class;
	}
	public function getByURL($slug)
	{
		return $this->model->where("url",$slug)->first();
	}
	public function delete($id)
	{
		\DB::select("
				update categories set parent_category_id=NULL where parent_category_id=".$id."
		");
		return parent::delete($id);
	}
	// public function getParent($id)
	// {
	// 	$parent_id = $this->model->find($id)->category_parent_id;
	// 	if (isset($parent_id) && !is_null($parent_id && $parent_id!="")) {
	// 	 	return $this->model->find($parent_id)->name;
	// 	 } 
	// 	 return $this->model->find($id)->name;
	// }
	public function getCategoryNaviagtion($total=5)
	{
		return $this->model->orderBy("id","ASC")->take($total)->get();
	}
	
	
}