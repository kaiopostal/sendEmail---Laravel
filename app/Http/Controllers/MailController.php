<?php

namespace App\Http\Controllers;

use App\Mail\BacancyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $email = $data['email'];
 
        $body = [
            'name'=>$data['name'],
            'url_a'=>'https://www.bacancytechnology.com/',
            'url_b'=>'https://www.bacancytechnology.com/tutorials/laravel',
        ];
 
        Mail::to($email)->send(new BacancyMail($body));
        return back()->with('status','Mail sent successfully');;
    }
}
