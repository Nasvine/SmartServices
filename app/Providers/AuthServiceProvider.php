<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                // ->view("emails.verify")
                ->greeting('Bonjour Mr/Mlle' . ' '.$notifiable->profile->last_name.' '  . $notifiable->profile->first_name . ',')
                ->subject("Confirmation de votre inscription")
                ->line("Nous sommes ravis de vous accueillir sur Smartservice ! Votre inscription a été confirmée avec succès. 
                Vous pouvez maintenant profiter de toutes les fonctionnalités et services que nous offrons.")
                ->line("Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail.")
                ->action("Vérifier l'adresse e-mail", $url)
                ->line("N'oubliez pas de personnaliser votre profil et de découvrir nos dernières fonctionnalités. Si vous avez des questions ou rencontrez des problèmes, n'hésitez pas à nous contacter à l'adresse smartservice@gmail.com.")
                ->line("Nous vous remercions de nous rejoindre et espérons que vous passerez un excellent moment sur Smartservice!");
        });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            return (new MailMessage)
                // ->view("emails.verify")
                ->greeting('Bonjour Mr/Mlle' . ' '.$notifiable->profile->last_name. ' '  . $notifiable->profile->first_name . ',')
                ->subject("Réinitialisation de votre mot de passe")
                ->line("Nous avons bien reçu votre demande de réinitialisation de mot de passe pour votre compte sur Smartservice. 
                Pour créer un nouveau mot de passe, veuillez cliquer sur le bouton ci-dessous pour accéder à la page de réinitialisation du mot de passe.")
                // ->action("Réinitialiser le mot de passe", $url)
                ->action('Réinitialiser le mot de passe', url('reset-password', $token))
                ->line("Si vous n'avez pas demandé cette réinitialisation de mot de passe, veuillez nous contacter immédiatement à l'adresse smartservice@gmail.com pour signaler toute activité suspecte.")
                ->line("Merci de faire confiance à Smartservice. Si vous avez des questions ou avez besoin d'aide supplémentaire, n'hésitez pas à nous contacter.");
        });

        $this->registerPolicies();
    }
}
