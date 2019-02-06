<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\sendEmail;


class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $subject = "A new contact message from $name";

        Mail::to('hsn.weerakoon.m@gmail.com')->send( new SendEmail($subject, $message, $email) );
        return redirect('/')->with('success', 'You will be replied soon. Thank you for contacting');
    }

    public function sendQuotation(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required',
            'inquiry' => 'required'
        ]);

        $name = $request->name;
        $email = $request->contact;
        $message = $request->inquiry;
        $subject = "Quotation Request From $name";

        Mail::to('hsn.weerakoon.m@gmail.com')->send( new SendEmail($subject, $message, $email) );
    }
}
