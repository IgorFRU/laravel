<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    
    protected $fillable = ['currency', 'currency_rus', 'css_style'];

    public function products() {
        return $this->hasMany("app\Product");
    }
}
