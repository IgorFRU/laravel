<?php

namespace app\Http\Controllers\Admin;

use app\Category;
use app\Menu;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (            
            'title'         => 'АДМИН - Паркетный мир - Категории',
            'categories'    => Category::orderBy('published', 'DESC')
                                    ->orderBy('id', 'DESC')
                                    ->paginate(10)
        );

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - Создание категории',
            'category' => [],
            //коллекция вложенных подкатегорий
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            //символ, обозначающий вложенность категорий
            'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
            'delimiter' => ''
        );
        
        return view('admin.categories.create', $data);
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

        $category = Category::create($request->all());

        if (Cache::has('categories_published')) {
            Cache::increment('categories_published');
        }
        
        return redirect()->route('admin.category.edit', $category)->with('success', 'Категория успешно добавлена. Теперь можно загрузить изображение.');
        //return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена');
        //return redirect()->back()->with('success', 'Категория успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \spp\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - Категории',
            'category' => $category,
            //коллекция вложенных подкатегорий
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            //символ, обозначающий вложенность категорий
            'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
            'delimiter' => ''
        );
        
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \spp\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('alias'));

        if (Cache::has('categories_published')) {
            if ($request->published) {
                Cache::increment('categories_published');
            } else {
                Cache::decrement('categories_published');
            }            
        }

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно сохранена');
        //return redirect()->back()->with('success', 'Категория успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \spp\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        unlink(public_path('imgs/categories/'.$category->img));
        $category->delete();
        //Category::destroy($category['id']);

        if (Cache::has('categories_published')) {
            Cache::decrement('categories_published');           
        }

        return redirect()->back()->with('success', 'Категория успешно удалена');
        //return redirect()->route('admin.category.index');
    }
}
