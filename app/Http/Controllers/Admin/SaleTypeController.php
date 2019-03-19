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
            'sales'         => Saletype::get()
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

        Saletype::create($request->all());
        
        return redirect()->route('admin.sale.index')->with('success', 'Скидка успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Saletype  $saletype
     * @return \Illuminate\Http\Response
     */
    public function show(Saletype $saletype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Saletype  $saletype
     * @return \Illuminate\Http\Response
     */
    public function edit(Saletype $saletype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Saletype  $saletype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saletype $saletype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Saletype  $saletype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saletype $saletype)
    {
        //
    }
}
