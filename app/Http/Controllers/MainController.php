<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Menu;
use app\Category;
use app\Product;
use app\Article;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Паркетный мир - Симферополь',
            'description' => 'Все виды паркета в Крыму по лучшим ценам',
            'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
            'categories'=> Category::orderBy('title', 'ASC')->get(),
            'recomended_products' => Product::where([
                ['recomended', '=', '1']
            ])->get(),
            'articles' => Article::where('published', 1)->orderby('id')->take(3)->get(),
        ];
        $data['breadcrumbs'] = \Request::get('breadcrumbs');

        return view('mainpage', $data);
    }
}
