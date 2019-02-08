<?php

namespace Parquet\Facades;
use Illuminate\Support\Facades\Facade;
 
class Cbr extends Facade{
    protected static function getFacadeAccessor() {
        return 'Cbr';
    }
}