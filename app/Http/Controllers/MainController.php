<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Menu;
use app\Category;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Паркетный мир - Симферополь',
            'description' => 'Все виды паркета в Крыму по лучшим ценам',
            'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
            'categories'=> Category::orderBy('title', 'ASC')->get(),
        ];
        $data['breadcrumbs'] = \Request::get('breadcrumbs');
        return view('mainpage', $data);
    }
}