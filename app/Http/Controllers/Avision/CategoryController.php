<?php

namespace App\Http\Controllers\Avision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
class CategoryController extends Controller
{
    protected $category;
    protected $product;
    public function __construct(CategoryRepositoryInterface $category,ProductRepositoryInterface $product)
    {
    	$this->category = $category;
        $this->product = $product;
    }
    public function getNavigation()
    {
        // return abort(500);
    	return  CategoryResource::collection($this->category->getCategoryNaviagtion());
    }
    public function getChildCategory($url)
    {
    	return CategoryResource::collection($this->category->getChild($url));
    }
    public function getPost($slug,$page){
        $id = \App\Category::where("url",trim($slug))->first()->id;
        $page = $page==0?1:$page;
        $limit = $page*1; 
        
        $query = " 
        SELECT posts.id,posts.title,posts.url,posts.thumbnail,posts.created_at,categories.name ,categories.url as url_category
        FROM posts,posts_categories,categories   
        Where posts.id = posts_categories.post_id and posts.status='publish' and categories.id = posts_categories.category_id and 
            categories.parent_category_id=".$id." 
        group by posts.id 
        Order by posts.id DESC limit ".$limit;
        $post = \DB::select($query);
        return response()->json([
            "posts"=>$post,
            "category"=>$this->category->find($id),
            "child"=>\App\Category::getChild($id),
        ]);
    }
    public function getPostChild($slug,$page){
        $id = \App\Category::where("url",trim($slug))->first()->id;
        $page = $page==0?1:$page;
        $limit = $page*1; 
        // $offset = $limit*($page-1);
        $query = "
        SELECT posts.id,posts.title,posts.url,posts.thumbnail,posts.created_at,categories.name ,categories.url as url_category 
        FROM posts,posts_categories,categories   
        Where posts.id = posts_categories.post_id and posts.status='publish' and categories.id = posts_categories.category_id and 
            categories.id=".$id." 
        group by posts.id 
        Order by posts.id DESC limit ".$limit;
        $post = \DB::select($query);
        $category_parent = $this->category->find($this->category->find($id)->parent_category_id);
        return response()->json([
            "posts"=>$post,
            "category_parent"=>$category_parent,
            "category"=>$this->category->find($id),
            "child"=>\App\Category::getChild($category_parent->id),
        ]);
    }
}
