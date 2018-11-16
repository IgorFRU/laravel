<?php

namespace Parquet;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id', 'created_at', 'created_at'];
    
    public function products() {
        return $this->hasMany("app\Product");
    }
}
