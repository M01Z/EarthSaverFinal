<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\euser;
use App\Models\vendor;

class signInController extends Controller
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
        $user = new euser;
        $email = request('uemail');
        $password = request('upsw');

        $userData = euser::where('email', $email)
                ->where('password', $password)
                ->get();

        //validations
        if ($userData->isEmpty()) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Please check your username/password!']);
        }
        
        
        if($userData){
            if($userData[0]->user_type == "Vendor")
            {
                session(['userId' => $userData[0]->id]);
                $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
                $eUserData = euser::where('id','=', $userData[0]->id)->get();

                // dd($vendorData->industryId);
                return view('vendorHome', ['vendorData' => $vendorData, 
                'approval_status' => $eUserData[0]->approval_status]);
            }
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
