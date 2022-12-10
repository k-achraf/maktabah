<?php

namespace App\Providers;

use App\Category;
use App\Type;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        $categories = Category::all();
        $types = Type::all();
        view()->share('categories', $categories);
        view()->share('types', $types);

        Gate::define('edit-users', function ($user) {
            return $user->role->id == 1 or $user->role->id == 2;
        });
        Gate::define('edit-categories', function ($user) {
            return $user->role->id == 1 or $user->role->id == 2;
        });
        Gate::define('edit-authors', function ($user) {
            return $user->role->id == 1 or $user->role->id == 2;
        });
        Gate::define('edit-books', function ($user) {
            return $user->role->id == 1 or $user->role->id == 2;
        });
        Gate::define('edit-requests', function ($user) {
            return $user->role->id == 1 or $user->role->id == 2;
        });
    }
}
