<?php

namespace app\Http\Controllers\Admin;

use app\Manufacture;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort_by = null, $sort_type = null)
    {
//        $sort_by = 5;
        $data = array (
            'title'         => 'АДМИН - Паркетный мир - Производители',
            'manufactures'    => Manufacture::orderBy('published', 'DESC')
                                    ->orderBy('id', 'DESC')
                                    ->paginate(10),
            'published'     => Manufacture::where('published', 1)->count(),
            'unpublished'   => Manufacture::where('published', 0)->count(),
            'sort_by'       => $sort_by,
            'sort_type'     => $sort_type
        );

        return view('admin.manufactures.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - добавление производителя',
            'manufacture' => [],
        );
        
        return view('admin.manufactures.create', $data);
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
            'manufacture' => 'required|unique:manufactures|min:3|max:64',
        ]);
        //метод для массовго заполнения

        Manufacture::create($request->all());
        
        return redirect()->route('admin.manufacture.index')->with('success', 'Производитель успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - редактирование производителя',
            'manufacture' => $manufacture
        );
        
        return view('admin.manufactures.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacture $manufacture)
    {
        $request->validate([
            'manufacture' => 'required|min:3|max:64',
        ]);
        
        $manufacture->update($request->except('slug'));

        return redirect()->route('admin.manufacture.index')->with('success', 'Производитель успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        $manufacture->delete();

        return redirect()->back()->with('success', 'Производитель успешно удален');
    }
    
    public function sort() 
    {
        
    }
}
