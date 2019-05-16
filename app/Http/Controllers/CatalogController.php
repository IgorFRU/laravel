<?php

namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;


use Illuminate\Http\Request;

use app\Menu;
use app\Currency;
use app\Category;
use app\Product;
use app\Unit;
use app\MyClasses\Cbr;

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

    public function anymethod(Request $request) {
        //dd($request->sort);
        
        echo $request->sort_column;
        echo $request->sort_type;
        
        
    }
    public function category($category){
        $hour = 60;
        $category = Category::where('alias', '=', $category)->get();
        
        $data = [
            'title' => $category[0]->title,
            'description' => $category[0]->description,
            'menus'=> Cache::remember(' menus', $hour, function() {    
                return Menu::orderBy('sortpriority', 'ASC')->get();
            }),
            'currency'=> Currency::get()->pluck('id', 'currency', 'to_update'),
            'categories'=> Category::orderBy('title', 'ASC')->get(),
            'unit'=>  Cache::remember(' unit', $hour, function() {
                return Unit::get();
            }),
            'category' => $category[0],
            'products' => Product::orderBy('recomended', 'DESC')
                ->orderBy('product_name', 'ASC')
                ->where([
                    ['published', '=', '1'],
                    ['category_id', '=', $category[0]->id]
                ])->get(),
            'currencyrates' => Cache::remember('cbr_associate', $hour, function() {
                return Cbr::getAssociate();
            }),
        ];
        $data['breadcrumbs'] = \Request::get('breadcrumbs');
        return view('category', $data);
    }
}
