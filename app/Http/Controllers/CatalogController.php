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
use app\Image;
use app\MyClasses\Cbr;

class CatalogController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * @param string $product product slug
     * @param string $category category slug
     * @return void
     */
    public function product($category, $product, $parameter = null) 
    {
//        echo __METHOD__;
        $hour = 60;
        $product = Product::where('slug', $product)->get();
        // dd($product[0]->category->id);
// dd($product);
        $data = [
            'title' => $product[0]->product_name,
            'category' => Category::where('alias', $category)->get()->pluck('title')[0],
            'menus'=> Cache::remember(' menus', $hour, function() {    
                return Menu::orderBy('sortpriority', 'ASC')->get();
            }),
            'categories'=> Category::orderBy('title', 'ASC')->get(),
            'currency'=> Currency::get()->pluck('id', 'currency', 'to_update'),
            'unit'=>  Cache::remember(' unit', $hour, function() {
                return Unit::get();
            }),
            'product' => $product[0],
            'recomended_products' => Product::where([
                ['recomended', '=', '1'],
                ['category_id', '=', $product[0]->category->id],
                ['id', '<>', $product[0]->id]
            ])->get(),
            'image' => Image::where('product_id', $product[0]->id)->get()->pluck('file'),
            // 'currencyrates' => Cache::remember('cbr_associate', $hour, function() {
            //     return Cbr::getAssociate();
            // }),
            'currencyrates' => Cbr::getAssociate(),
        ];

        $data['description'] = $data['category'];
        // dd($data['image']);
        return view('product', $data);
    }

    public function anymethod(Request $request) {
        //dd($request->sort);
        
        echo $request->sort_column;
        echo $request->sort_type;
        
        
    }
    /**
     * category
     *
     * @param  mixed $category - category slug
     *
     * @return void
     */
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
            // 'currencyrates' => Cache::remember('cbr_associate', $hour, function() {
            //     return Cbr::getAssociate();
            // }),
            'currencyrates' => Cbr::getAssociate(),
        ];
        $data['breadcrumbs'] = \Request::get('breadcrumbs');
        return view('category', $data);
    }
}
