<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributePage extends Model
{
    protected  $table="attribute_pages";
    protected $fillable = [
    	"title","description","url","banner","quote","special_id"
    ];
    public function special()
    {
    	return $this->belongsTo(Special::class);
    }
}
