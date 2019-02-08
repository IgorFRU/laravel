<?php

namespace Parquet\Http\Controllers\Admin;

use Parquet\Product;
use Parquet\Category;
use Illuminate\Http\Request;
use Parquet\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - Товары',
            'products' => Product::orderBy('published', 'DESC')
                                    ->orderBy('id', 'ASC')
                                    ->paginate(10),
            'published' => Product::where('published', 1)->count(),
            'unpublished' => Product::where('published', 0)->count()
        ); 
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
            'title'             => 'АДМИН - Паркетный мир - Добавление товара',
            'product'           => [],
            'categories'        => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'         => ''
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
     * @param  \Parquet\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Parquet\Product  $product
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
     * @param  \Parquet\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Parquet\Product  $product
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
