<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;

class ContactController extends Controller
{

  public function showForm(Request $request) {
    return view('welcome');
  }

  public function storeForm(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'subject'=>'required',
        'message' => 'required'
     ]);

     ContactUs::create($request->all());

    
    return back()->with('success', 'Thanks for contacting us.');
  }

}