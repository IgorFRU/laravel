<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function product() {
        return $this->hasMany(Product::class);
    }
}
