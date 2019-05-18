<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['product_id', 'file', 'name', 'alt', 'thumbnail'];

    public function products() {
        return $this->belongsTo(Product::class);
    }
}