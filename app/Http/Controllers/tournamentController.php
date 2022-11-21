<?php

namespace App\Http\Controllers;
use App\Models\tournament;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class tournamentController extends Controller
{
    public function index(){
        $tournaments=tournament::all();
        return view('modules.tournament.index')->with('tournament',$tournaments);
    }
    public function insert(Request $request){
       $request->validate([
        'playername'=>'required',
        'sportsname'=>'required',
        'dob'=>'required',
        'department'=>'required',
        'achivement'=>'required',
    ]);

     $tournament=new tournament();
    $tournament->playername=$request->playername;
    $tournament->sportsname=$request->sportsname;
    $tournament->dob=$request->dob;
    $tournament->department=$request->department;
    $tournament->achivement=$request->achivement;
    $tournament->save();
    Alert::success("Success","successfully inserted");
    return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'playername'=>'required',
            'sportsname'=>'required',
            'dob'=>'required',
            'department'=>'required',
            'achivement'=>'required',
        ]);
        
        $tournament=tournament::find($request->id);
    $tournament->playername=$request->playername;
    $tournament->sportsname=$request->sportsname;
    $tournament->dob=$request->dob;
    $tournament->department=$request->department;
    $tournament->achivement=$request->achivement;
    $tournament->save();
        Alert::success('success','Successfully updated');
        return redirect()->back();

    }
    public function delete($id){
        tournament::find($id)->delete();
        Alert::success('Success','Suceessfully Deleted'); 
        return redirect()->back();
    }  
}

