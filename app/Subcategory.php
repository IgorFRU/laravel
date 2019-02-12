<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = ['id', 'created_at', 'created_at'];
    
    public function products() {
        return $this->hasMany("app\Product");
    }
    
    public function categories() {
        return $this->belongsTo("app\Category", 'category_id', 'id');
    }
    
}
