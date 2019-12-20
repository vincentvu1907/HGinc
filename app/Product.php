<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
    	"name","url","description","price","affilate_link",'network','image'
    ];
    public function posts()
    {
    	return $this->belongsToMany(Post::class,'posts_products','product_id','post_id');
    }
}
