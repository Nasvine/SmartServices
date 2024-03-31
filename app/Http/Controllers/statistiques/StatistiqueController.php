<?php

namespace App\Http\Controllers\statistiques;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\admin\livraisons\Livraison;

class StatistiqueController extends Controller
{
    public function index(Request $request){
       // dd($request->day_date);

        if($request->day_date){
            $statistique_today = Livraison::where('livraison_date', $request->day_date)->get();
            $statistics_delivery_pay_today = Livraison::where('livraison_date', $request->day_date)->where('status_livraison', 'Payée')->sum('prix');
            $statistics_delivery_notpay_today = Livraison::where('livraison_date', $request->day_date)->where('status_livraison', 'non payée')->count();
            return view('gestionnaires.statistiques.index', compact('statistique_today', 'statistics_delivery_pay_today', 'statistics_delivery_notpay_today'));
        }else{
            $statistique_today = Livraison::where('livraison_date', Carbon::now()->format('Y-m-d'))->get();
            $statistics_delivery_pay_today = Livraison::where('livraison_date', Carbon::now()->format('Y-m-d'))->where('status_livraison', 'Payée')->sum('prix');
            $statistics_delivery_notpay_today = Livraison::where('livraison_date', Carbon::now()->format('Y-m-d'))->where('status_livraison', 'non payée')->count();
            return view('gestionnaires.statistiques.index', compact('statistique_today', 'statistics_delivery_pay_today', 'statistics_delivery_notpay_today'));

        }

    }
}
