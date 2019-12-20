<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    protected $table="posts";
    protected $fillable = [
    	"title","description","content","url","thumbnail","view",
    	"author_id","status","sticky"
    ];
    public function searchableAs()
    {
        return '_title_';
    }
    public function categories()
    {
    	return $this->belongsToMany(Category::class,"posts_categories","post_id","category_id");
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class,"posts_tags","post_id","tag_id");
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function specials()
    {
        return $this->belongsToMany(Special::class,"posts_specials","post_id","special_id");
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,"posts_products","post_id","product_id");
    }
}
