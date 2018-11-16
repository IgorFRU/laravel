<?php

namespace Parquet;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    
    
    public function products() {
        return $this->hasMany("app\Product");
    }
}
