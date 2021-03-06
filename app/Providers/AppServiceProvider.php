<?php

namespace App\Providers;

use App\Models\Category;

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
        // view()->composer('*', function($view){
        //     $view->with([
        //         'category' => Category::where('status',1)->orderBy('name', 'ASC')->get();
        //         ]);
        // });
        view()->composer('*', function ($view) {
            $view->with([
                'category' => Category::where('status', 1)->orderBy('name', 'ASC')->get(),
                'cart_total' => 20
            ]);
        });
    }
}
