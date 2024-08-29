<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Users;
use App\Helpers\Common;
use App\Models\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Observers\MessageObserver;
use illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Message::observe(MessageObserver::class);
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Gate::define('is_admin', fn(User $user) => $user->level === 'admin');
        Gate::define('admin_delete', fn(User $user) => $user->username === 'irfan1991');
        Gate::define('departement_admin_staff', fn(User $user) => $user->level === 'guest' || $user->level === 'admin' || $user->level === 'staff');
        Gate::define('admin_staff_security', fn(User $user) => $user->level === 'admin' || $user->level === 'staff' || $user->level === 'security');
        Gate::define('admin_staff', fn(User $user) => $user->level === 'admin' || $user->level === 'staff');
        Gate::define('admin_guest', fn(User $user) => $user->level === 'guest' || $user->level === 'admin');
        Gate::define('produksi', fn(User $user) => $user->level !== 'produksi');
        Gate::define('admin_tirza', fn(User $user) => $user->level === 'admin' || $user->username === 'tirzatiara' || $user->username === 'jamilacwf');
        Gate::define('admin_tirza_produksi_agusnaini', fn(User $user) => $user->level === 'produksi' || $user->level === 'admin' || $user->username === 'tirzatiara' || $user->username === 'agusnaini' || $user->username === 'jamilacwf');
        Gate::define('admin_tirza_produksi_agusnaini_security', fn(User $user) => $user->level === 'produksi' || $user->level === 'admin' || $user->username === 'tirzatiara' || $user->username === 'agusnaini' || $user->username === 'jamilacwf' || $user->level === 'security');
        Gate::define('admin_tirza_agusnaini', fn(User $user) => $user->level === 'admin' || $user->username === 'tirzatiara' || $user->username === 'agusnaini' || $user->username === 'jamilacwf');
        Gate::define('admin_tirza_agusnaini_security', fn(User $user) => $user->level === 'admin' || $user->username === 'tirzatiara' || $user->username === 'jamilacwf' || $user->username === 'agusnaini' || $user->level === 'security');

    }
}
