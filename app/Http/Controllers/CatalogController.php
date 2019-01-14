<?php

namespace Parquet\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class CatalogController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function product($category, $subcategory, $product, $parameter = null) 
    {
        //return 'Каталог товаров';
        
//        echo __METHOD__;
        $output = 'Категория/раздел: '.$category.
            '.<br>Подкатегория: '.$subcategory.
            '.<br>Товар: '.$product;
        if($parameter)
        {
            $output .= '<br><b>Дополнительный необязательный параметр: '.$parameter.'</b>';
        }

        echo $output;        
    }
}
