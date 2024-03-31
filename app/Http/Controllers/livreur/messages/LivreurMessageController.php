<?php

namespace App\Http\Controllers\livreur\messages;

use App\Http\Controllers\Controller;
use App\Models\admin\notifications\NotificationLivreur;
use Illuminate\Http\Request;

class LivreurMessageController extends Controller
{
    public function index(){
        NotificationLivreur::where('status', 'non lu')->update(['status' => 'lu']);
        $messages = NotificationLivreur::OrderBy('id', 'desc')->where('status', 'lu')->get();
        //dd($messages);
        return view('livreurs.messages.index', compact('messages'));
    }

    public function message_write($id){
        $message = NotificationLivreur::find($id);
        NotificationLivreur::whereId($id)->where('type_de_notification', 'Courses')->update(['status' => 'lu']);
        return to_route('course.livreur.index');
    }

    public function write_livraison($id){
        $message = NotificationLivreur::find($id);
        NotificationLivreur::whereId($id)->where('type_de_notification', 'Livraison')->update(['status' => 'lu']);
        return to_route('livraison.livreur.index');
    }

    public function delete_message($id){
        NotificationLivreur::find($id)->delete();
        return redirect()->back();
    }

    public function message_all_write(){
        // $message = NotificationLivreur::find($id);
        
        return to_route('course.livreur.index');
    }
}
