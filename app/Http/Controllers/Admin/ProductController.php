<?php

namespace app\Http\Controllers\Admin;

use app\Product;
use app\Category;
use app\Manufacture;
use app\Unit;
use app\Currency;
use app\Rebate;
use app\Image;
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
        $columns = [
            'id',
            'product_name',
            'scu',
            'category_id',
            'price',
            'currency_id',
            'published',
            'recomended',
            'views'
        ];
        $data = array (            
            'title'         => 'АДМИН - Паркетный мир - Товары',
            'products'      => Product::select($columns)
                                    ->with(['category:id,title'])
                                    ->orderBy('id', 'DESC')
                                    ->orderBy('published', 'ASC')
                                    ->paginate(10),
            'categories'    => Category::get(),
            'currencies'    => Currency::get(),
            'manufactures'  => Manufacture::get(),
            'currencies'    => Currency::get()
        ); 
        // dd ($data['products']);
        return view('admin.products.index', $data);

        // leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //                             ->select(
        //                                 'products.product_name', 
        //                                 'products.price', 
        //                                 'products.scu', 
        //                                 'products.published', 
        //                                 'products.recomended', 
        //                                 'products.id', 
        //                                 'categories.title')
        //                             //->where()
        //                             ->
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $next_id = Product::max('id');
        $data = array (            
            'title'         => 'АДМИН - Паркетный мир - Добавление товара',
            'product'       => [],
            'categories'    => Category::with('children')->where('parent_id', 0)->get(),
            'manufactures'  => Manufacture::get(),
            'currencies'    => Currency::get(),
            'units'         => Unit::get(),
            'rebates'       => Rebate::get(),
            'add_js'        => 'js/product.ajax.js',
            'next_id'       => ++$next_id,
            'delimiter'     => ''
        ); 
        // dd($data['next_id']);
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

        
        Product::create($request->all());

        // $last_id = Product::max('id');

        // $thumbnail = Image::where('product_id', $last_id)->get();
        // //dd($thumbnail);
        // Product::where('id', $last_id)
        //   ->update(['thumbnail' => $thumbnail->thumbnail]);
        
        return redirect()->route('admin.product.index')->with('success', 'Товар успешно добавлен');
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
        $data = array (            
            'title'       => 'АДМИН - Паркетный мир - Добавление товара',
            'product'     => $product,
            'categories'  => Category::with('children')->where('parent_id', 0)->get(),
            'manufactures'=> Manufacture::orderBy('manufacture', 'ASC')->get(),
            'currencies'  => Currency::get(),
            'units'       => Unit::get(),
            'rebates'     => Rebate::get(),
            'images'      => Image::where('product_id', '=', $product->id)->get(),
            'delimiter'   => ''
        ); 
        
        return view('admin.products.edit', $data);
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
        $product->update($request->all());

        return redirect()->route('admin.product.index')->with('success', 'Товар успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Товар успешно удален');
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
