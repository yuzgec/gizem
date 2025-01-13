<?php

namespace App\Providers;

use App\Models\Features;
use App\Models\Page;
use App\Models\PageCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{

    public function boot()
    {

       
            Paginator::useBootstrap();
            config()->set('settings', Setting::pluck('value','item')->all());

            $Pages = Page::with('getCategory')->where('category', 1)->get();
            $Service = Service::with('getCategory')->get();
            $ProductCategory = ProductCategory::with('cat')->where('parent_id', null)->get();
            $Product = Product::with(['getCategory'])->where('status', '=', 1)->get();
            $ServiceCategory = ServiceCategory::where('parent_id', null)->get();

            View::share([
                'Pages' => $Pages,
                'Service' => $Service,
                'ProductCategory' => $ProductCategory,
                'Product' => $Product,
                'ServiceCategory' => $ServiceCategory,
            ]);
       
    }
}
