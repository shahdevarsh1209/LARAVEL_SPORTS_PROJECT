<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Imports\PlayerImport;
use App\Exports\PlayerExport;



class categoryController extends Controller
{
    public function index(){
        $categories=category::all();
        return view('modules.category.index',compact('categories'));
    }
    public function delete($id){
        category::find($id)->delete();
        Alert::success('success','Delete success');
        return redirect()->back();
    } 
     public function insert(Request $request){
         $request->validate([
             'playername'=>'required',
             'email'=>'required|email',
             'image'=>'required',

         ]);
         $image=$request->image;
         $imageName = $request->name.'_'.time().'.'.
   $image->extension();
   $image->move(public_path('profile'),
   $imageName);
   $category= new category();
   $category->playername=$request->playername;
   $category->email=$request->email;
   $category->image=$imageName;
   
   $category->save();
   
   Alert::success("success","successfully insert ");
   return redirect()->back();
   
}
public function update(Request $request){
    $request->validate([
        'id' => 'required',
        'playername' => 'required',
        'email' => 'email',
    ]);
    $category=category::find($request->id);
    $category->playername=$request->playername;
    $category->email=$request->email;
    $category->save();
    Alert::success('success','successfully updated');
    return redirect()->back();
}

public function bulkUpload(Request $request){
    Excel::import(new PlayerImport(),$request->file('uploadfile'));
    Alert::success('success','Successfully Uploaded');
    return redirect()->back();
}

public function download(){
    return Excel::download(new PlayerExport(),'project.xlsx');
}

}
