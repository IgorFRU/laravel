<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id', 'created_at', 'created_at'];
    
    public function product() {
        return $this->hasMany(Product::class);
    }
}
