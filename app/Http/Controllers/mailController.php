<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validate;
class mailController extends Controller
{
    public function send(Request $request)
    {
         $this->validate($request, [
              'name'     => 'required',
              'email'    => 'required',
              'msg'      => 'required'
         ]);

         $data = array(
              'name'     => $request->name,
              'email'    => $request->email,
              'msg'      => $request->msg
         );

         Mail::to('issa.sofer@gmail.com')->send( new SendMail($data));
         return back();
    }
}
