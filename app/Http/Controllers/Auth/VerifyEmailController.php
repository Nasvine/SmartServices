<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        Alert::success('Merci pour votre inscription!','Bienvenue sur votre tableau de bord.');
        return to_route('client')->with('warning', 'Cher Client, avant de poursuivre, veuillez mettre à jour votre profile.Pour le faire, déplacez votre curseur sur l\' image par défaut
        se trouvant en haut à droite à côté de l\'icône de panier. Dans le menu qui s\'affiche, Cliquez sur profile.');
    }
}
