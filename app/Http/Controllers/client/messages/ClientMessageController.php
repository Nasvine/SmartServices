<?php

namespace App\Http\Controllers\client\messages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\notifications\Notification;

class ClientMessageController extends Controller
{
    public function index(){
        Notification::where('status', 'non lu')->where('type_d_acteur', 'Client')->where('user_receive_id', Auth::id())->where('type_d_acteur', 'Client')->update(['status' => 'lu']);
        $messages = Notification::OrderBy('id', 'desc')->where('type_d_acteur', 'Client')->where('user_receive_id', Auth::id())->where('status', 'lu')->get();
        //dd($messages);
        return view('clients.messages.index', compact('messages'));
    }

    public function message_write($id){
        $message = Notification::find($id);
        Notification::whereId($id)->where('type_de_notification', 'Courses')->update(['status' => 'lu']);
        return to_route('course.gestionnaire.index');
    }

    public function write_livraison($id){
        $message = Notification::find($id);
        Notification::whereId($id)->where('type_de_notification', 'Livraison')->where('type_d_acteur', 'Client')->where('user_receive_id', Auth::id())->where('type_d_acteur', 'Client')->update(['status' => 'lu']);
        return to_route('livraison.client.index');
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
