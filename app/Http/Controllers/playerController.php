<?php

namespace App\Http\Controllers;
use App\Models\player;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class playerController extends Controller
{
    public function index(){
        $players=player::all();
        return view('modules.player.index',compact('players'));
    }
    public function delete($id){
        player::find($id)->delete();
        Alert::success('success','Delete success');
        return redirect()->back();
    }
     public function insert(Request $request){
         $request->validate([
             'name'=>'required',
             'age'=>'required',
             'gender'=>'required',
             'sportsname'=>'required',
             'contactno'=>'required',

         ]);
     
    

   $player= new player();
   $player->name=$request->name;
   $player->age=$request->age;
   $player->gender=$request->gender;
   $player->sportsname=$request->sportsname;
   $player->contactno=$request->contactno;
   
   $player->save();
   
   Alert::success("success","successfully insert ");
   return redirect()->back();
   
}
public function update(Request $request){
    $request->validate([
        'name'=>'required',
             'age'=>'required',
             'gender'=>'required',
             'sportsname'=>'required',
             'contactno'=>'required',

    ]);
    $player=player::find($request->id);
    $player->name=$request->name;
    $player->age=$request->age;
    $player->gender=$request->gender;
    $player->sportsname=$request->sportsname;
    $player->contactno=$request->contactno;
    $player->save();
    Alert::success('success','successfully updated');
    return redirect()->back();
}
}