<?php

namespace App\Http\Controllers\client\boutique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class FedayPayRestaurantController extends Controller
{
    public function __construct()
    {
        /* Remplacez VOTRE_CLE_API par votre véritable clé API */   
        FedaPay::setApiKey(env('API_SECRETE_sand'));

        /* Précisez si vous souhaitez exécuter votre requête en mode test ou live */
        FedaPay::setEnvironment('sandbox'); //ou setEnvironment('sandbox');
    }

    public function process_restaurant(Request $request){
        
        
        try {
            $transaction = Transaction::create(
                $this->datatransaction()
            );
            $token =$transaction->generateToken();
            
            return redirect()->away($token->url);
            
        } catch (\Exception $e) {
            return back()->with('danger',$e->getMessage());
        }
        
    }
    public function datatransaction(){
       $customerdata=[
                "firstname" => "Kevine",
                "lastname" => "NASSARA",
                "email" => "vinenassara@gmail.com",
                "phone_number" => [
                    "number" => "+22966000001",
                    "country" => "bj"
                ]
        ];   

        return [
            "description" => "vente Iphone 14",
            "amount" => 1000,
            "currency" => ["iso" => "XOF"],
            "callback_url" => url('callback'),
            "customer" => $customerdata
        ];
    }
    
    public function callback_restaurant(Request $request){
        $transaction_id = $request->input('id');
        $message ="";
        try {
            $transaction=Transaction::retrieve($transaction_id);

            switch ($transaction->status) {
                case 'approved':
                    $message='Transaction approuvé avec sucess';
                    break;
                case 'canceled':
                    $message='Transaction Annulée ';
                    break;
                case 'declined':
                    $message='Transaction déclinée';
                    break;


            }
        } catch(\Exception $e){
            $message =$e->getMessage();
        }

        return view('callback', compact('message'));
    }
}
