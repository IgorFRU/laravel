<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = array(
        //     'menus'=> Menu::orderBy('sortpriority', 'ASC')->get(),
        // );
        // return view('home');
        //return view('admin.core');
        return redirect('/admin');
    }
}
