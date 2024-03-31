<?php

namespace App\Http\Controllers\client\livraisons\restaurant;

use Kkiapay\Kkiapay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KkiaPayPaiementController extends Controller
{
    protected $kkiapay;

    public function __construct()
    {
        $this->kkiapay = new Kkiapay("cc7cb3b09db511ee87187175d55d1502", "tpk_cc7cdac09db511ee87187175d55d1502", "tsk_cc7cdac19db511ee87187175d55d1502",true);
    }
    public function callback($transactionId){

        $info_transaction = $this->kkiapay->verifyTransaction($transactionId);

        //dd($info_transaction->status);

        if($info_transaction->status == "SUCCESS"){
            Alert::success('Paiement par KKiapay', 'Transaction effectué(e) avec succès.');
            //dd($info_transaction);
            return view('clients.boutique.create')->with('success', 'Transaction effectué(e) avec succès.');

        }
    }
}
