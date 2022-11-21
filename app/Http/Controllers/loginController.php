<?php

namespace App\Http\Controllers;
use Illuminate\Support\facades\session;
use Illuminate\Http\Request;
use Auth;
use Alert;
class loginController extends Controller
{
    public function login(Request $request){
        $crediantials=$request->only('email','password');
        
        if(Auth::attempt($crediantials)){
            if(Auth::user()->type=="1")
            {
                return redirect()->route('admin.index');
                alert::success('success','successfully Logged In');
            }
            else
            {
                return redirect()->to('index');
                alert::success('success','successfully Logged In');
            

        }
    }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        Alert::success('Logged Out');
        return redirect()->to('login');
    }

}
