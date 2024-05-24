<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\industry;
use App\Models\vendor;
use App\Models\euser;

class industryController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $industry = request('industry');
        
        if($industry == null || $industry == ''){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Please enter a valid Industry Type!']);
        }

        $userData = DB::table('industries')
        ->where('name', '=', $industry)
        ->get();

        if(count($userData)>0){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Industry type already exists.']);
        }

        $newIndustry = new industry;
        $newIndustry->name = $industry;
        $newIndustry->save();

        
        $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
        $eUserData = euser::where('id','=', Session::get('userId'))->get();
        $flag = 1;
                
        return view('vendorHome', ['vendorData' => $vendorData, 'approval_status' => $eUserData[0]->approval_status]);
        
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
