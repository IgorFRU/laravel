<?php

namespace app\Http\Controllers\Admin;

use app\Rebate;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class RebateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (
            'title'     => 'АДМИН - Паркетный мир - Скидки',
            'rebates'   => Rebate::get()
        );

        return view('admin.rebates.index', $data);
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
            'rebate' => [],
        );
        
        return view('admin.rebates.create', $data);
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
            'rebate' => 'required|unique:rebates|max:64',
        ]);

        Rebate::create($request->all());
        
        return redirect()->route('admin.rebate.index')->with('success', 'Скидка успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Rebate  $rebate
     * @return \Illuminate\Http\Response
     */
    public function show(Rebate $rebate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Rebate  $rebate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rebate $rebate)
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - редактирование скидки',
            'rebate' => $rebate
        );
        
        return view('admin.rebates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Rebate  $rebate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rebate $rebate)
    {
        $request->validate([
            'rebate' => 'required|max:64',
        ]);
        
        $rebate->update($request->all());

        return redirect()->route('admin.rebate.index')->with('success', 'Скидка успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Rebate  $rebate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rebate $rebate)
    {
        $rebate->delete();

        return redirect()->back()->with('success', 'Скидка успешно удалена');
    }
}
