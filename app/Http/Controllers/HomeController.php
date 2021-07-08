<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataCat = DB::table('categorys')->orderBy('category')->get();
        $data = DB::table('products')
    			->join('categorys','products.catId','categorys.id')
                 ->select('products.*', 'categorys.category')
                 ->orderBy('id', 'DESC')
                 ->limit(40)
    			->get();
        return view('home',compact('data','dataCat'));
    }
}
