<?php

namespace app\Http\Controllers\Admin;

use app\Saletype;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class SaletypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (
            'title'         => 'АДМИН - Паркетный мир - Скидки',
            'sales'         => SaleType::get()
        );

        return view('admin.sales.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - добавление скидки',
            'sale' => [],
        );
        
        return view('admin.sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sale_type' => 'required|unique:sale_type|max:64',
        ]);

        SaleType::create($request->all());
        
        return redirect()->route('admin.sale.index')->with('success', 'Скидка успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\SaleType  $saleType
     * @return \Illuminate\Http\Response
     */
    public function show(SaleType $saleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\SaleType  $saleType
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleType $saleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\SaleType  $saleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleType $saleType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\SaleType  $saleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleType $saleType)
    {
        //
    }
}
