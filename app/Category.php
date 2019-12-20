<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Category extends Model
{
    use Searchable;
    protected $table = "categories";
    protected $fillable  = [
    	"name","url","parent_category_id","description","sticky"
    ];
    public function searchableAs()
    {
        return '_name_';
    }
    public function posts()
    {
    	return $this->belongsToMany(Post::class,"posts_categories","category_id","post_id");
    }
    public function category_parent($id)
    {
    	return \DB::table("categories")->where("id",$id)->first();
    }
    public static function getParent($id)
    {
        $parent_id = \DB::table("categories")->where("id",$id)->first()->parent_category_id;
        if (isset($parent_id) && !is_null($parent_id && $parent_id!="")) {
            return \DB::table("categories")->where("id",$parent_id)->select("id","name","url")->first();
         } 
         return \DB::table("categories")->where("id",$id)->select("id","name","url")->first();
    }
    public static function getChild($id)
    {
        return \DB::table("categories")->where("parent_category_id",$id)->select("url","name",'created_at')->get();
    }
}
