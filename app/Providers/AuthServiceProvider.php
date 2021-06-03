<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
Gate::define('admin', function ($user) {
    return $user->admin == 'S' && $user->ativo == 'S';
});
Gate::define('removerInscricao', function ($user) {
     return $user->id === $idLista->user_id;
});
Gate::define('meuperfil', function ($user) {

        });

        Gate::define('ativo', function ($user) {
    return $user->ativo == 'S';
});
        //
    }
}
