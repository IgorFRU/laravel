<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
    protected $fillable = ['rebate', 'value', 'type', 'start_at', 'end_at'];
    
    public $timestamps = false;

    public $table = "rebates";

    public function product() {
        return $this->hasMany(Product::class);
    }
}
