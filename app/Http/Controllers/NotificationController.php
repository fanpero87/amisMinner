<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class NotificationController extends Controller
{
    public function notify(){
        return view('notification');
    }

    public function notify(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'comment' => 'required'
                ]);

        Mail::send('email', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('comment') ],
                function ($message) {
                        $message->from('noreply@example.com');
                        $message->to('contact@example.com', 'This is a User')
                        ->subject('Your Website Contact Form');
        });

        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

    }


}
