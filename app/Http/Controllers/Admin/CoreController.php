<?php

namespace Parquet\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Parquet\Http\Controllers\Controller;

class CoreController extends Controller
{
    public function core()
    {
        return view('admin.core');
    }
}
