<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'message' => 'required|string|min:8',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

       // Send email
       $to = 'mesumanbd@gmail.com'; // Replace with your email address
       $subject = 'Contact Form Submission';
       $data = [
           'name' => $request->name,
           'email' => $request->email,
           'message' => $request->message,
       ];

       Mail::send('contact.email', $data, function ($message) use ($to, $subject) {
           $message->to($to)
               ->subject($subject);
       });

       return response()->json([
        'success' => true,
        'message' => 'Thank You. Our Representive contact as soon as possible.'
        ]);

    }
}
