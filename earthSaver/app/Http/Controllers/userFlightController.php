<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\flight;
class userFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flights = flight::select('flights.*', 'eusers.name as vendor')
        ->join('vendors', 'flights.vendorId', '=', 'vendors.id')
        ->join('eusers', 'vendors.userId','=','eusers.id')
        ->orderBy('carbon_emission', 'asc')
        ->paginate(5);
        
        return view('userViewFlights', ['flights' => $flights]);
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
        if($request!=null && $request->input('departure')!=null && $request->input('departure')!='' 
        && $request->input('destination')!=null && $request->input('destination')!=''){
            
            
            $flights = flight::select('flights.*','eusers.name as vendor')
            ->where('departure', 'LIKE',$request->input('departure').'%')
            ->where('destination', 'LIKE',$request->input('destination').'%')
            ->join('vendors', 'flights.vendorId', '=', 'vendors.id')
            ->join('eusers', 'vendors.userId','=','eusers.id')
            ->orderBy('carbon_emission', 'asc')
            ->paginate(5);
            
            return view('userViewFlights', ['flights' => $flights]);
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
