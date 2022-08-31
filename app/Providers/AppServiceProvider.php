<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Stripe
use App\Models\Cashier\User;
use Laravel\Cashier\Cashier;
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
        //Stripe
        Cashier::useCustomerModel(User::class);
        
    }
}
