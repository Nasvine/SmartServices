<?php

namespace App\Http\Controllers\gestionnaire\messages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\notifications\Notification;

class GestionnaireMessageController extends Controller
{
    public function index(){
        Notification::where('status', 'non lu')->update(['status' => 'lu']);
        $messages = Notification::OrderBy('id', 'desc')->where('status', 'lu')->get();
        //dd($messages);
        return view('gestionnaires.messages.index', compact('messages'));
    }

    public function message_write($id){
        $message = Notification::find($id);
        Notification::whereId($id)->where('type_de_notification', 'Courses')->update(['status' => 'lu']);
        return to_route('course.gestionnaire.index');
    }

    public function write_livraison($id){
        $message = Notification::find($id);
        Notification::whereId($id)->where('type_de_notification', 'Livraison')->update(['status' => 'lu']);
        return to_route('livraison.gestionnaire.index');
    }

    public function delete_message($id){
        Notification::find($id)->delete();
        return redirect()->back();
    }

    public function message_all_write(){
        // $message = Notification::find($id);
        
        return to_route('course.gestionnaire.index');
    }
}
