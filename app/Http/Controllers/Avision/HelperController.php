<?php

namespace App\Http\Controllers\Avision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttributePage;
use App\Repositories\Specials\SpecialRepositoryInterface;

class HelperController extends Controller
{
	protected $special;
	protected $attribute;
	public function __construct(SpecialRepositoryInterface $special){
		$this->special = $special;
		$this->attribute = AttributePage::first();
	}
    public function getConfig()
    {
    	return response()->json([
    		"data"=>$this->attribute
    	]);
    }
    public function getEvent()
    {
    	$special = $this->special->find($this->attribute->special_id);
    	// dd($this->attribute->special_id);
    	return response()->json([
    		"special"=>$special,
    		"posts"=>$special->posts,
    	]);
    }
    public function getSearch($txt){
    	$data = [];
    	$like  = "%".$txt."%";
    	$post = \App\Post::where("title","LIKE",$like)->select('title','url')->get();
    	$category = \App\Category::where("name","LIKE",$like)->where("id",">",5)->get();
    	$categories = [];
    	foreach ($category as $c) {
    		array_push($categories,[
    			"category"=>$c,
    			"parent"=>\App\Category::getParent($c->id)
    		]);
    	}
    	return response()->json([
    		"posts"=>$post,
    		"categories"=>$categories
    	]);
    }
    public function sitemap(){
        $posts = \App\Post::select('url','created_at','updated_at')->get();
        $parent = \App\Category::select('id','url','created_at','updated_at')->Orderby("id","ASC")->take(5)->get();
        $categories = [];
        foreach ($parent as $p) {
           array_push($categories,[
            "parent"=>$p,
            "child"=>\App\Category::getChild($p->id)
           ]);
        }
        return response()->json([
            "posts"=>$posts,
            "parent"=>$parent,
            "categories"=>$categories
        ]);
    }
    public function scout($query)
    {
        $posts = \App\Post::search($query)->get();
        $category = \App\Category::search($query)->get();
        $categories = [];
        foreach ($category as $c) {
            if ($c->id>5) {
                array_push($categories,[
                    "category"=>$c,
                    "parent"=>\App\Category::getParent($c->id),
                ]);
            }
        }
        return response()->json([
            "posts"=>$posts,
            "categories"=>$categories
        ]);
    }
}
