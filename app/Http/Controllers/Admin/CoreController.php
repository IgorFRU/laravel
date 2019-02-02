<?php

namespace Parquet\Http\Controllers\Admin;

use Parquet\Category;
use Illuminate\Http\Request;
use Parquet\Http\Controllers\Controller;

class CoreController extends Controller
{
    public function core()
    {
//        $count_of_categories = Category::select('views')->where('published', '1')->get();
//        $count = 0;
//        foreach ($count_of_categories as $var) {
//            $count += $var['viesw'];
//        }

        return view('admin.core', [

//            'count' => $count
        ]);
    }
}
