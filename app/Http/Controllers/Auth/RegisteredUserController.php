<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Pest\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'nomUtilisateur' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $tab = array(
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        );

        //dd($request['email'], $tab);
        $tab_profile = array(
            'first_name'         =>  $request->first_name,
            'last_name'          =>  $request->last_name,
            'email'              =>  $request->email,
            // 'nomUtilisateur'     =>  $request->nomUtilisateur,
            'phone'              =>  $request->phone,
        );
        //dd($request->all(), $tab_profile, $tab);
        
        $user = User::create($tab);
        $profile = $user->profile()->create($tab_profile);
        // $mailInscripton = [
        //     'title' => 'Créaction de compte',
        // ];
        
        // Mail::to($tab['email'])->send(new \App\Mail\users\InscriptionMail($mailInscripton));
        //dd($mailInscripton);
        
        event(new Registered($user));
        
        Auth::login($user);
        //dd($request->all(), $tab, $mailInscripton);

        Alert::success('Merci pour votre inscription!','Veuillez consulter votre email pour nous faire verifier votre email.');
        return view('auth.verify-email');/* ->with('warning', 'Cher Client, avant de poursuivre, veuillez mettre à jour votre profile.Pour le faire, déplacez votre curseur sur l\' image par défaut
        se trouvant en haut à droite à côté de l\'icône de panier. Dans le menu qui s\'affiche, Cliquez sur profile.'); */
    }
}
