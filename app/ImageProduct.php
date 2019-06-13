<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $fillable = ['image_id', 'product_id'];

    public $timestamps = false;
    public $table = "image_product";
}
