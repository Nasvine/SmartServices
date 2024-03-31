<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }


    public function seen_super_admin_sidebar(User $user): bool
    {
        return $user->hasPermission('sidebar_super_admin');
    }

    public function seen_admin_sidebar(User $user): bool
    {
        return $user->hasPermission('sidebar_admin');
    }

    public function seen_gestionnaire_sidebar(User $user): bool
    {
        return $user->hasPermission('sidebar_gestionnaire');
    }

    public function seen_client_sidebar(User $user): bool
    {
        return $user->hasPermission('sidebar_client');
    }

    public function seen_livreur_sidebar(User $user): bool
    {
        return $user->hasPermission('sidebar_livreur');
    }

    public function seen_super_admin_navbar(User $user): bool
    {
        return $user->hasPermission('navbar_super_admin');
    }

    public function seen_admin_navbar(User $user): bool
    {
        return $user->hasPermission('navbar_admin');
    }

    public function seen_gestionnaire_navbar(User $user): bool
    {
        return $user->hasPermission('navbar_gestionnaire');
    }

    public function seen_client_navbar(User $user): bool
    {
        return $user->hasPermission('navbar_client');
    }

    public function seen_livreur_navbar(User $user): bool
    {
        return $user->hasPermission('navbar_livreur');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
