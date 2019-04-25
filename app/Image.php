<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file', 'name', 'alt', 'thumbnail'];
}
