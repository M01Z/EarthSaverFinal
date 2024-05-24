<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\product;
use App\Models\productCategory;

class userProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::select('products.*', 'eusers.name as vendor')
        ->join('vendors', 'products.vendorId', '=', 'vendors.id')
        ->join('eusers', 'vendors.userId','=','eusers.id')
        ->orderBy('carbon_emission', 'asc')
        ->paginate(5);
        
        $productCategory = productCategory::all();
        return view('userViewProducts', ['products' => $products, 'productCategory' => $productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        if($id!=null && $request!=null){
            if($id ==1){
                if($request->input('name') !=null && $request->input('name') !=''){
                    $products = Product::select('products.*', 'eusers.name as vendor')
                    ->where('products.name', 'LIKE',$request->input('name').'%')
                    ->join('vendors', 'products.vendorId', '=', 'vendors.id')
                    ->join('eusers', 'vendors.userId','=','eusers.id')
                    ->orderBy('carbon_emission', 'asc')
                    ->paginate(5);

                    $productCategory = productCategory::all();

                    return view('userViewProducts', ['products' => $products, 'productCategory' => $productCategory]);
                }

                $products = Product::select('products.*', 'eusers.name as vendor')
                ->where('categoryId', '=', $request->input('productCategory'))
                ->join('vendors', 'products.vendorId', '=', 'vendors.id')
                ->join('eusers', 'vendors.userId','=','eusers.id')
                ->orderBy('carbon_emission', 'asc')
                ->paginate(5);

                $productCategory = productCategory::all();
                return view('userViewProducts', ['products' => $products, 'productCategory' => $productCategory]);
            }
        }
    
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
    }
}
