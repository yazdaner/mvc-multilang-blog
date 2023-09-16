<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('superAdmin')) {
                return true;
            }
            if ($user->hasRole('admin')) {
                if($ability == 'users' || $ability == 'languages' ){
                    return false;
                }else{
                    return true;
                }
            }

            if ($user->hasRole('writer')) {
                if($ability == 'posts' || $ability == 'events' || $ability == 'news' || $ability == 'tags' || $ability == 'categories' || $ability == 'dashboard' ){
                    return true;

                }else{
                    return false;
                }
            }
        });
    }
}
