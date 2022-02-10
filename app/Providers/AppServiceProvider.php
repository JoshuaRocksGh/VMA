<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $noData = "<div class='nodata'>
        <img class='img-fluid' id='no_data_available_img' src='assets/images/placeholders/no_data.svg' alt='no data available' style='max-width:100px' >
        <p class='no-data-text d-block mt-2' style=' font-weight: bold; 
                                        color: currentColor;'> No Data Available </p>
</div>";
        View::share('noDataAvailable', $noData);
        //
    }
}
