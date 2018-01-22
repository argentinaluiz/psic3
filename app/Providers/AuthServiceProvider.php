<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Models\Painel\Call;
use App\Models\Painel\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       /*
        'App\Model' => 'App\Policies\ModelPolicy',
        */
        'App\Models\Painel\Call' => 'App\Policies\CallTestPolicy'

    ];

        
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        /*
        Gate::define('view-call', function($user, Call $call){
            return $user->id == $call->user_id;
          });
         }*/

        /*if(!app()->runningInConsole()){
            $permissions = Permission::with('roles')->get();
            //dd($permissions);
            foreach( $permissions as $permission )
            {
                $gate->define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }
            
            $gate->before(function(User $user, $ability){
                
                if ( $user->hasAnyRoles('adm') )
                    return true;
                
            });
        }*/
    }

    public function listPermissions()
    {
      return Permission::with('roles')->get();
    }


}
