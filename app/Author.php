<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";
    protected $fillable = [
    	"name","description","url","backlink"
    ];
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
