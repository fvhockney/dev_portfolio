<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyMail;
use App\Mail\TheirMail;

class SendMail extends Controller
{
    public function SendMail(Request $request)
    {
      try {
        Mail::to($request->email)->send(new TheirMail($request));
        Mail::to(config('mail.from.address'))->send(new MyMail($request));
        return response()->json(['status'=>'success', 'message'=>'Your mail has been sent successfully']);
      } catch (\Exception $e) {
        return response()->json(['status'=>'error', 'message'=>'Something went wrong. Please try again later or contact the system administrator to report a problem.']);
      }

      return response()->json(Mail::failures());
    }
}
