<?php

namespace app\Http\Controllers\Admin;

use app\Product;
use app\Category;
use app\Manufacture;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category = null)
    {
        $data = array (            
            'title'         => 'АДМИН - Паркетный мир - Товары',
            'products'      => Product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
                                    ->select(
                                        'products.product_name', 
                                        'products.price', 
                                        'products.scu', 
                                        'products.published', 
                                        'products.recomended', 
                                        'products.id', 
                                        'categories.title')
                                    //->where()
                                    ->orderBy('products.published', 'DESC')
                                    ->orderBy('products.id', 'ASC')
                                    ->paginate(10),
            'categories'    => Category::get(),
            'manufactures'  => Manufacture::get(),
            'published'     => Product::where('published', 1)->count(),
            'unpublished'   => Product::where('published', 0)->count()
        ); 
        // dd ($data['products']);
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title'       => 'АДМИН - Паркетный мир - Добавление товара',
            'product'     => [],
            'categories'  => Category::with('children')->where('parent_id', 0)->get(),
            'manufactures'=> Manufacture::get(),
            'delimiter'   => ''
        ); 
        
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
//        echo __METHOD__;
        echo $category;
    }
}
