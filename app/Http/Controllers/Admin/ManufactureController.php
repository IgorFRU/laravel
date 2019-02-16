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
                                    ->orderBy('id', 'ASC')
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
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
