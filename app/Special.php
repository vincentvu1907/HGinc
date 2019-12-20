<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $table = "specials";
    protected $fillable = [
    	"name","slug","description",
    ];
    public function posts()
    {
    	return $this->belongsToMany(Post::class,"posts_specials","special_id","post_id");
    }
    
}
