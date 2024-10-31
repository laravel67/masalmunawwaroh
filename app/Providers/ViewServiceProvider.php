<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Taj;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fetch the tahun information once and share it with all views
        // $tahun = Taj::where('status', '1')->first();
        // $tahunName = $tahun ? $tahun->name : '';

        // View::share('tahunName', $tahunName);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

