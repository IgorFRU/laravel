<?php

namespace app\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Http\Request;

use app\Menu;
use app\Category;
use app\Product;

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
        //dd($category);
        $category = Category::where('alias', '=', $category)->get();
        //dd( $category);
        $data = [
            'title' => $category[0]->title,
            'description' => $category[0]->description,
            'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
            'categories'=> Category::orderBy('title', 'ASC')->get(),
            'category' => $category[0],
            'products' => Product::orderBy('recomended', 'DESC')
                ->orderBy('product_name', 'ASC')
                ->where([
                    ['published', '=', '1'],
                    ['category_id', '=', $category[0]->id]
                ])->get(),
        ];
        // dd($data['products2']);
        $data['breadcrumbs'] = \Request::get('breadcrumbs');
        return view('category', $data);
    }
}
