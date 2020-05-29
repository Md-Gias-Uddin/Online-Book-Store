<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;


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
        //view()->share('name','CSE');
       view()->composer('fronEnd.includes.menu',function($view){
        $pcategories = Category::where('publication_status',1)->get();
        $view->with('pcategories',$pcategories);
       });


    }
}
