<?php

namespace app\Http\Controllers\Admin;

use app\Unit;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (
            'title'         => 'АДМИН - Паркетный мир - Единицы измерения',
            'units'         => Unit::get()
        );

        return view('admin.units.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - добавление единицы измерения',
            'unit' => [],
        );
        
        return view('admin.units.create', $data);
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
            'unit' => 'required|unique:units|max:64',
        ]);
        //метод для массовго заполнения

        Unit::create($request->all());
        
        return redirect()->route('admin.unit.index')->with('success', 'Ед. изм. успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - редактирование ед. изм.',
            'unit' => $unit
        );
        
        return view('admin.units.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'unit' => 'required|max:64',
        ]);
        
        $unit->update($request->all());

        return redirect()->route('admin.unit.index')->with('success', 'Ед. изм. успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
