<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // protected $guarded = ['id'];
    protected $fillable = ['unit'];

    public $timestamps = false;
    
    public function product() {
        return $this->hasMany(Product::class);
    }
}
