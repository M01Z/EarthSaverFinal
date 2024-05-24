<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\product;
use App\Models\vendor;
use App\Models\euser;
use App\Models\productCategory;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd("hello world");

        $ProductCategories = DB::table('product_categories')
        ->get();

        return view('newProduct', ['productCategories' => $ProductCategories]);
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
        if($request!= null && $request->input('name')!=null && $request->input('ce')!=null 
        && $request->input('discount1')!=null && $request->input('discount2')!=null && $request->input('discount3')!=null
        && $request->input('productCategory')!=null){

        $product = new product;
        $product->name = $request->input('name');
        $product->carbon_emission = $request->input('ce');
        $product->discount1 = $request->input('discount1');
        $product->discount2 = $request->input('discount2');
        $product->discount3 = $request->input('discount3');
        $product->categoryId = $request->input('productCategory');
        $alreadyExists = product::where('name','=', $product->name)->get();

        if(count($alreadyExists)>0){
            if($alreadyExists[0]->vendorId == Session::get('userId'))
                return redirect()->back()->withInput()->withErrors(['error' => 'Product already exists.']);
        }


        $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();

        if($vendorData){
            $product->vendorId = $vendorData->id;
            $product->save();
            $eUserData = euser::where('id','=', Session::get('userId'))->get();
            return view('vendorHome', ['vendorData' => $vendorData, 'approval_status' => $eUserData[0]->approval_status]);
        }
        else
            return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occured.']);
        }
        else{
            return redirect()->back()->withInput()->withErrors(['error' => 'Please enter valid details']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($id != null){
            $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();

            if($request!=null && $request->input('name')!=null){
                $products = Product::where('vendorId', '=', $vendorData->id)
                ->where('name', 'LIKE',$request->input('name').'%')
                ->get();

                $productCategory = productCategory::all();
                return view('vendorViewProducts', ['products' =>$products, 'productCategory' => $productCategory]);
            }

            if($request!=null && $request->input('productCategory')!=null){
                $products = Product::where('vendorId', '=', $vendorData->id)
                ->where('categoryId', '=', $request->input('productCategory'))
                ->get();

                $productCategory = productCategory::all();
                return view('vendorViewProducts', ['products' =>$products, 'productCategory' => $productCategory]);
            }
        }

        else{
            dd("else");
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
        dd("edit");
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
        if($request!= null && $request->input('name')!=null && $request->input('ce')!=null 
        && $request->input('discount1')!=null && $request->input('discount2')!=null && $request->input('discount3')!=null
        && $request->input('productCategory')!=null){

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->carbon_emission = $request->input('ce');
        $product->discount1 = $request->input('discount1');
        $product->discount2 = $request->input('discount2');
        $product->discount3 = $request->input('discount3');
        $product->categoryId = $request->input('productCategory');
        $product->save();


        $productCategory = productCategory::all();
        return view('vendorViewProducts',['productCategory' => $productCategory]);
        
        }
        else{
            return redirect()->back()->withInput()->withErrors(['error' => 'Please enter valid details']);
        }
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

        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
