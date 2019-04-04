<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
     //protected $table = 'rebates';

    protected $fillable = ['rebate', 'value', 'type', 'start_at', 'end_at', 'active'];
    
    public $timestamps = false;

    public $table = "rebates";

    public function product() {
        return $this->hasMany(Product::class);
    }
}
