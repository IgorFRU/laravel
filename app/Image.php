<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file', 'name', 'alt', 'thumbnail', 'main'];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}