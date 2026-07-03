<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
use Exception;

class MailController extends Controller{
     public function contactUs(Request $request){
        $user = $request->input('user');
        $email = $request->input('email');
        $message = $request->input('message');
        $userData = compact('user', 'email', 'message');

        try{
            Mail::to($email)->send(new ContactMail($userData));
        }catch(Exception $e){
            return redirect()->route('home')->with('emailError', "C'è stato un problema, per favore riprova tra un pò");
        }
        return redirect(route('home'))->with('emailSent', 'Hai correttamente inviato una email');
    }
}