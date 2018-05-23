<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyMail;
use App\Mail\TheirMail;

class SendMail extends Controller
{
    public function SendMail(Request $request)
    {
      // Mail::to($request->email)->send(new TheirMail($request));
      // Mail::to(env('MAIL_ADDRESS'))->send(new MyMail($request));
      return new MyMail($request);
    }
}
