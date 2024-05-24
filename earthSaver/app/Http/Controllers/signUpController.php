<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\euser;
use App\Models\vendor;

class signUpController extends Controller
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
        // signing up the user
        $user = new euser;
        $name = request('uname');
        $email = request('uemail');
        $password = request('upsw');
        

        // validations
        if(request('type') == 'Vendor'){
            $type = 'Vendor';
        }
        else{
            $type = 'User';
        }

        if($name == null || $name == ''){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Please enter a valid User Name!']);
        }
        
        if($email == null || $email == ''){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Please enter a valid Email!']);
        }

        if($password == null || $password == ''){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Please enter a valid Password!']);
        }

        else if(request('type') == null || request('type') == '')
        {
            return redirect()->back()->withInput()->withErrors(['Error' => 'Please select valid Account Type!']);
        }

        $userData = DB::table('eusers')
        ->where('email', '=', $email)
        ->get();

        if(count($userData)>0){
            return redirect()->back()->withInput()->withErrors(['Error' => 'Email already exists.']);
        }
        // saving the data back to the user table
        $user->Name = $name;
        $user->Email = $email;
        $user->Password = $password;
        $user->User_Type = $type;
        $user->Approval_Status = 0;
        $user->save();

        if(request('type') == 'Vendor'){
            $vendor = new vendor;
            $vendor->userId = $user->id;
            $vendor->save();
        }
        
        return view('welcome');
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
