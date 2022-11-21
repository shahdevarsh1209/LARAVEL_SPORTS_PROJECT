<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Hash; 
use Alert;
use Mail;
use App\Mail\sendOtp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function  profile(){
     $admin=user::find(1);
    return view('admin.profile',compact('admin'));
}
    public function profileUpdate(Request $request){
            $profile=user::find(Auth::user()->id);
       
            if($profile->avatar == null){
                $image=$request->image;
                $imageName = $request->name.'_'.time().'.'.$image->extension();
                $image->move(public_path('profile'),$imageName);
                $profile->name=$request->name;
                $profile->email=$request->email;
                $profile->avatar=$imageName;
                $profile->save();
            }else{
                unlink(public_path('profile/'.$profile->avatar));
                $image=$request->image;
                $imageName = $request->name.'_'.time().'.'.$image->extension();
                $image->move(public_path('profile'),$imageName);
                $profile->name=$request->name;
                $profile->email=$request->email;
                $profile->avatar=$imageName;
                $profile->save();

            }
                
            return redirect()->back();
            }
            public function changepassword(Request $request){
                $request->validate([
                    'oldpassword'=> 'required',
                    'newpassword'=> 'required'
                ]);
                $id=Auth::user()->id;
                $user=user::find($id);
                if(Hash::check($request->oldpassword,$user->password)){
                    $user->password=Hash::make($request->newpassword);
                    $user->save();
                    Alert::success("Password Successfully changed");
                    return redirect()->back();
                
                    
                }else{
                    Alert::error("Failed to change");
                    return redirect()->back();
                    
                }
            }
            
    public function customForgetPass(Request $request){
        // return $request;
        // $request->validate([
        //     'email'=>'required',
        // ]);

        $user=User::where('email',$request->email)->first();

        if($user == null){
            return "no user exist";
            // return redirect()->back()->with('message','No user exist');
        }else{
            $otp=mt_rand(1000,9999);

          
                Mail::to($request->email)->send(new sendOtp($otp));
    
           return view('matchOtp')->with(['email'=>$request->email,'otp'=>$otp]);
        }
    }
    public function matchOtp(Request $request){
        if($request->emailOtp == $request->userOtp){
            if($request->newPassword == $request->confirmPassword){
                $user= User::where('email',$request->email)->update([
                    'password'=>Hash::make($request->newPassword)
                ]);
                return redirect()->back()->with('message',"successfully Changed");
            }else{
                return redirect()->back()->with('message',"Confirm PAssword Didnt  matched");
            }
        }else{
            return redirect()->back()->with('message',"Otp is wrong");
        }
    }
    }
