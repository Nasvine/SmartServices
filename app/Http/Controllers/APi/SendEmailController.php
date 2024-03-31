<?php

namespace App\Http\Controllers\APi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function store(Request $request){

        $attrs = $request->validate([
            'email'   => 'required|email',
        ]);

        
        if($attrs["email"]){
            $messages = [
                'message'        => "Boujour Anycourse",
            ];
            Mail::to($attrs["email"])->send(new \App\Mail\SendEmailSimple($messages));

            return response([
                'message' => 'Message envoyé par email avec succès.',
            ], 200);
        }else{
            return response([
                'message' => 'Email n\'existe pas.',
            ], 422);
        }
    }
}
