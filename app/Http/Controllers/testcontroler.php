<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\test;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class testcontroler extends Controller


{

 public function welcome()
    {
       
        return view('welcome');
    }
    
    public function test()
    {

           $test = test::all();
        return view('test', compact('test'));
        
       
    }



     public function login()
    {
       
        return view('login');
    }



     public function  Sumitlogin ( Request $request)
{
  $request -> validate([
      'email' => 'required',
      'password'=> 'required',
  ]);
    try {
     if (Auth::attempt([ 'email'=> Request('email') ,  'password' => Request('password')])){

      return view( "Dashbord");
     }

    
} catch(Exception $e) {
   
    Log::error('API Call Failed: ' . $e->getMessage());
    
    return response()->json(['error' => 'Service temporarily unavailable'], 503);
}


    }
}


