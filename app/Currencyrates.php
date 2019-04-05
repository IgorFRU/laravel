<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Currencyrates extends Model
{
    protected $fillable = ['currency_id', 'value', 'ondate'];

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
