<?php

namespace Parquet\Http\Controllers\Admin;

use Parquet\Category;
use Illuminate\Http\Request;
use Parquet\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.categories.index', [
            'categories' => Category::paginate(10),
            'published' => Category::where('published', 1)->count(),
            'unpublished' => Category::where('published', 0)->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category' => [],
            //коллекция вложенных подкатегорий
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            //символ, обозначающий вложенность категорий
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //метод для массовго заполнения

        Category::create($request->all());
        
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Parquet\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Parquet\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            //коллекция вложенных подкатегорий
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            //символ, обозначающий вложенность категорий
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Parquet\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('alias'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Parquet\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        //Category::destroy($category['id']);

        return redirect()->back()->with('success', 'Категория успешно удалена');
        //return redirect()->route('admin.category.index');
    }
}
