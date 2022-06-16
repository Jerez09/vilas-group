<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'message' => 'string|required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;


        Mail::to('luxury-realestate@vilas-group.com')->send(new ContactForm($name, $email, $message));

        return redirect()->back()->with([
            'message' => __('Su mensaje ha sido enviado.'),
            'status' => 'success'
        ]);
    }
}
