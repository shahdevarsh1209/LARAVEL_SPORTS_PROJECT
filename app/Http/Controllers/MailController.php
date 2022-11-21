<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\verfication;

class MailController extends Controller
{
    public function sendMail(){
        $data=[
            'subject'=> 'This is mail subject',
            'message'=> 'This is my mail message'
        ];
        Mail::to('shahanil1208@gmail.com')->send(new verfication($data));
         return "Email send successfully";
    }
}
