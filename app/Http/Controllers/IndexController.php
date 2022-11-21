<?php

namespace App\Http\Controllers;
use  Illuminate\Support\facades\Hash;
use Illuminate\Http\Request;
use  App\Models\User;
use Alert;
class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function registration(){
        return view('registration');
}
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        
        ]);
            $store = new User();
            $store->name = $request->name;
            $store->email = $request->email;
          
            $store->password = Hash::make($request->password);
            $store->save();
            Alert::success('success','Registration success');
            return redirect()->to('login');
          //  return $store;
    }
}   