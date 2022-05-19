<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create', [
            'category' => Category::all()
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
        //
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'integer',
            'product_description' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'product_category_code' => 'required'
        ],
        [
            'product_category_code.required' => 'Please Required Category Code'
            
        ]);

        $product = new ProductModel;
        $product->ProductName = $request->product_name;
        $product->ProductCode = $request->product_code;
        $product->CategoryId = $request->product_category_code;
        $product->Price = $request->product_price;
        $product->Description = $request->product_description;
        $product->IsActive = 1;
        $product->color = $request->product_color;
        $product->size =  $request->product_size;

        if($product->save()){
            return redirect('/home')->with('success','Product created successfully.');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return view('products.show',[
        //     'id' => $id,
        //     'data' => ProductModel::where('Productid',$id)->first()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = DB::table('product')
        ->select('product.*' , 'category.CategoryId' ,'category.CategoryCode','category.Description as cat_desc')
        ->leftJoin('category', 'product.CategoryId', '=', 'category.CategoryId')
        ->where('product.Productid',$id)
        ->first();

   
        return view('products.show',[
            'id' => $id,
           # 'data' => ProductModel::where('Productid',$id)->first(),
           'data' => $data,
           'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product =  ProductModel::find($id);
        $product->ProductName = $request->product_name;
        $product->ProductCode = $request->product_code;
        $product->Price = $request->product_price;
        $product->Description = $request->product_description;
        $product->IsActive = $request->product_status;
        $product->CategoryId = $request->product_category_code;
        $product->color = $request->product_color;
        $product->size =  $request->product_size;
        $product->save();

        return redirect('/home')->with('success', 'Record Successfully Updated!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return ProductModel::where('ProductId',$id)->delete();
        #return redirect('/home')->with('success','Record Successfully Delete!');
    }

    public function search(Request $request){
        // $search  = ProductModel::where('ProductName','LIKE',"%{$request->search}%")
        // ->orWhere('ProductCode','LIKE',"%{$request->search}%")
        // ->orWhere('Description','LIKE',"%{$request->search}%")
        // ->get();

        $search = DB::table('product')
        ->select('product.*' , 'category.CategoryId' ,'category.CategoryCode','category.Description as cat_desc')
        ->leftJoin('category', 'product.CategoryId', '=', 'category.CategoryId')
        ->where('product.ProductName','LIKE',"%{$request->search}%")
        ->orWhere('product.ProductCode','LIKE',"%{$request->search}%")
        ->orWhere('product.Description','LIKE',"%{$request->search}%")
        ->get();
        return view('home',['data' => $search]);
    }
}
