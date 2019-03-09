<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Saletype extends Model
{
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function product() {
        return $this->hasMany(Product::class);
    }
}
