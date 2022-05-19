<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data = DB::table('product')
             ->select('product.*' , 'category.CategoryId' ,'category.CategoryCode','category.Description as cat_desc')
            ->leftJoin('category', 'product.CategoryId', '=', 'category.CategoryId')
            ->get();

        return view('home',[
            'products' => $data
        ]);
    }
}
