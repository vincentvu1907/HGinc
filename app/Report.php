<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";
    protected $fillable = [
    	"report","customer_id"
    ];
    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
