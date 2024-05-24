<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\flight;
use App\Models\vendor;
use App\Models\euser;

class flightController extends Controller
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
        //
        if($request!= null && $request->input('departure')!=null 
        && $request->input('destination')!=null 
        && $request->input('ce')!=null 
        && $request->input('discount1')!=null 
        && $request->input('discount2')!=null 
        && $request->input('discount3')!=null){
    
            $flight = new flight;
            $flight->departure = $request->input('departure');
            $flight->destination = $request->input('destination');
            $flight->carbon_emission = $request->input('ce');
            $flight->discount1 = $request->input('discount1');
            $flight->discount2 = $request->input('discount2');
            $flight->discount3 = $request->input('discount3');
            //$flight->vendorId = Session::get('userId');

            $alreadyExists = flight::where('departure','=', $flight->departure)
            ->where('destination','=', $flight->destination)
            ->get();

            if(count($alreadyExists)>0){
                if($alreadyExists[0]->vendorId == Session::get('userId'))
                    return redirect()->back()->withInput()->withErrors(['error' => 'Flight path already exists.']);
            }

            $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
            if($vendorData){
                $flight->vendorId = $vendorData->id;
                $flight->save();
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
        //
        //dd("hello world");
        $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();

        if($request!=null && $request->input('departure')!=null && $request->input('departure')!='' 
        && $request->input('destination')!=null && $request->input('destination')!=''){
            
            
            $flight = flight::where('vendorId', '=', $vendorData->id)
            ->where('departure', 'LIKE',$request->input('departure').'%')
            ->where('destination', 'LIKE',$request->input('destination').'%')
            ->get();

            return view('vendorViewFlights',['flight' => $flight]);
        }

        else{
            return redirect()->back()->withInput()->withErrors(['error' => 'Please enter valid details']);
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
    {   //dd($request);
        if($request!= null && $request->input('departure')!=null && $request->input('destination')!=null 
        && $request->input('ce')!=null 
        && $request->input('discount1')!=null && $request->input('discount2')!=null && $request->input('discount3')!=null){

        $flight = flight::find($id);
        $flight->departure = $request->input('departure');
        $flight->destination = $request->input('destination');
        $flight->carbon_emission = $request->input('ce');
        $flight->discount1 = $request->input('discount1');
        $flight->discount2 = $request->input('discount2');
        $flight->discount3 = $request->input('discount3');
        $flight->save();


        $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
        $flight = flight::where('vendorId','=',$vendorData->id)->get();
        return view('vendorViewFlights',['flight' => $flight]);
        
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
        $flight = flight::find($id);
        $flight->delete();
        return redirect()->back();
    }
}
