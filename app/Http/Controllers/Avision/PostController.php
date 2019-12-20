<?php

namespace App\Http\Controllers\Avision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
   protected $post,$category;
    public function __construct(
    	PostRepositoryInterface $post,
    	CategoryRepositoryInterface $category
    )
    {
    	$this->post = $post;
    	$this->category = $category;
    }
    public function getPostByCategory($id)
    {
    	$limit = 9;
        switch ($id) {
            case 1:
                $limit=9;
                break;
            case 2:
                $limit=5;
                break;
            case 3:
                $limit=8;
                break;
            case 4:
                $limit=5;
                break;
            case 5:
                $limit=5;
                break;
            
        };
        $query = "
        SELECT posts.id,posts.title,posts.url,posts.thumbnail 
        FROM posts,posts_categories,categories   
        Where posts.id = posts_categories.post_id and posts.status='publish' and categories.id = posts_categories.category_id and 
            categories.parent_category_id=".$id." 
        group by posts.id 
        Order by posts.id DESC limit ".$limit;
        $posts = \DB::select($query);
    	// $child_category = \App\Category::where("parent_category_id",$id)->get();
    	// $posts = [];
    	// foreach ($child_category as $c) {
    	// 	if (count($c->posts)>0) {
    	// 		foreach ($c->posts as $post) {
    	// 			array_push($posts,$post);
    	// 		}
    	// 	}
    	// }
    	// usort($posts,function($a,$b){
    	// 	return $a->id<$b->id;
    	// });
    	return response()->json(["posts"=>$posts,'category'=>$this->category->find($id)]);
    }
    public function getPost($slug){
        $post = $this->post->getByURL(trim($slug));
        $categories = $post->categories;
        $parent_category = [];
        foreach ($categories as $cas) {
            $parent = \App\Category::getParent($cas->id);
            $query = "
            SELECT posts.id,posts.title,posts.url,posts.thumbnail 
            FROM posts,posts_categories,categories   
            Where posts.id = posts_categories.post_id and posts.id<>".$post->id." and posts.status='publish' and categories.id = posts_categories.category_id and 
                categories.parent_category_id=".$parent->id." 
            group by posts.id 
            Order by posts.id DESC limit 6";
            array_push($parent_category,[
                "parent"=>$parent,
                "post"=>\DB::select($query)
            ]);
        }
       

        
        return response()->json([
            "post"=>$post,
            "categories"=>$categories,
            "category_parent"=>$parent_category,
            "lastest"=>$this->post->getLastest($post->id),
            "tags"=>$post->tags
        ]);
    }
}
