<?php

namespace app\Http\Controllers\Admin;

use app\Category;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class CoreController extends Controller
{
    public function core()
    {
//        $count_of_categories = Category::select('views')->where('published', '1')->get();
//        $count = 0;
//        foreach ($count_of_categories as $var) {
//            $count += $var['viesw'];
//        }
        $data = array (            
            'title' => 'АДМИН - Паркетный мир',
            'published' => Category::where('published', 1)->count(),
            'unpublished' => Category::where('published', 0)->count()
        ); 

        return view('admin.core', $data);
    }
}
