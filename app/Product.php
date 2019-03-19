<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'inner_scu', 'alias', 'created_at', 'created_at'];
    
    public function manufacture() {
        return $this->belongsTo(Manufacture::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function currency() {
        return $this->belongsTo(Currency::class);
    }
    
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
    
    public function saletype() {
        return $this->belongsTo(Saletype::class);
    }

    public static function publishedCount() {
        return Product::where('published', 1)->count();
    }
}
