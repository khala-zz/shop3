<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
//use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;

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
    public function boot(UrlGenerator $url)
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        //get tat ca category
        /*$categories = Category::select('id','title','parent_id')  -> where('is_active',1) -> get();
        // share cho menu danh muc san pham
        View::share('categories_share', $categories);*/
        if (env('APP_ENV') !== 'local') {
                    $url->forceScheme('https');
              }
    }
}
