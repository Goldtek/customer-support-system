<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use DB;



class LoginController extends Controller
{
   

    public function login(Request $request){
     
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:4',
        ]);
        
        
        if(!Auth::attempt($request->only(['email', 'password']),$request->has('remember'))){
            return redirect()->route('login')->withInfo("Error Logging In. Check Email / Password");
        }
        return redirect()->intended(route('dashboard'));
    }

     public function logOut(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}