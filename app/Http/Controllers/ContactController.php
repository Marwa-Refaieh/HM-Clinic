<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('demo.contact');
    }

    public function contact_us(Request $request){
        $this->validate($request , [
            'email' => 'required|email',
            'name' => 'required|string',
            'comment' => 'required|string',
        ]);

        $email = $request->email;
        Mail::send('email' , [
            'comment'=> $request->comment,
            'name'=> $request->name,
            'email'=> $request->email,
            ],
            function($message){
                $message->from('hmclinic8@gmail.com');
                $message->to(env('mail_from_address') , 'hm_clinic')
                        ->subject('please reply me');
            });

            return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }
}
