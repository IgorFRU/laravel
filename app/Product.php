<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'inner_scu', 'alias', 'created_at', 'created_at'];
    
    public function categories() {
        return $this->belongsTo("app\Category");
    }
    
    public function currencies() {
        return $this->belongsTo("app\Currency");
    }
}
