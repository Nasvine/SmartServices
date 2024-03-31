<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //dd($request->all(), $request['remember']);
        $request->authenticate();

        $request->session()->regenerate();

        if(!auth()->attempt($request->only(["email", "password"]), $request->remember)){
            return redirect()->back()->with('error','Identifiants invalides'); 
        }
       // dd('toto');
        // Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
        // return to_route('admin');

        $user_role = Auth::user()->role->name;
        //dd($user_role);

            switch ($user_role) {

                case "Super Admin":
                    if(isset(Auth::user()->profile)){
                        Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                        return to_route('admin');
                    }else{

                        Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                        return to_route('admin')->with('warning', 'Cher Admin, avant de poursuivre, veuillez mettre à jour votre profile.Pour le faire, déplacez votre curseur sur l\' image par défaut
                        se trouvant en haut à droite à côté de l\'icône de panier. Dans le menu qui s\'affiche, Cliquez sur profile.');                    
                    }
                    break;

                case "Admin":
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('admin');

                    break;

                case "Gestionnaire Commande":
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('gestionnaire');

                    break;
                case "Client":
                    //dd(isset(Auth::user()->profile));
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('client');

                    break;

                case "Livreur":
                    Alert::success('Connexion réussie!','Bienvenue sur votre tableau de bord.');
                    return to_route('livreur');

                    break;

                default:
                    Alert::warning('login failed!','Vos identifiants sont incorrets.');
                    return redirect()->back();
            }

        #return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
