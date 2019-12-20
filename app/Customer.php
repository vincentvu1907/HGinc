<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = [
    	"name","email","password","image"
    ];
    public function reports()
    {
    	return $this->hasMany(Report::class);
    }
}
