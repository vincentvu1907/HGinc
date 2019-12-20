<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    protected $fillable = [
    	"name"
    ];
    public function posts()
    {
    	return $this->belongsToMany(Post::class,"posts_tags","post_id","tag_id");
    }
}
