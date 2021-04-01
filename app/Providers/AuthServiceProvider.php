<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function(User $user){
            return $user->isAdmin;
        });
        Gate::define('checkPremiumAdminPostOwner', function(User $user, $id){
            $post_user_id=Post::find($id)->user_id;
            return $user->isAdmin || $user->isPremium || $post_user_id==$user->id;
        });
        //
    }
}