<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\euser;
use App\Models\vendor;

class vendorProfileController extends Controller
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
        dd("create");
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
        dd("store");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id){
            $userData = DB::table('eusers')
            ->where('id', '=', $id)
            ->get();

            $vendorData = DB::table('vendors')
            ->where('userId', '=', $id)
            ->get();

            $industryData = DB::table('industries')
            ->get();

            return view('vendorProfile', ['userData' => $userData, 
            'vendorData' => $vendorData, 
            'industryData' => $industryData]);

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
        dd(edit);
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
        if($id && $request!= null && $request->input('address')!=null && $request->input('website')!=null 
        && $request->input('industry')!=null && $request->input('carbonStrategy')!=null){
            // dd($request->input('industry'));

            $record = vendor::where('userId', $id)->first();
            if ($record) {
                $record->address = $request->input('address');
                $record->website = $request->input('website');
                $record->industryId = $request->input('industry');
                $record->carbonStrategy = $request->input('carbonStrategy');
                $record->save();
    
                $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
                $eUserData = euser::where('id','=', Session::get('userId'))->get();
                return view('vendorHome', ['vendorData' => $vendorData, 'approval_status' => $eUserData[0]->approval_status]);
            } else {
                // Handle the case where the record with the specified userId doesn't exist
            }
            


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
    }
}
