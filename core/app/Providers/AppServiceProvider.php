<?php

namespace App\Providers;

use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Page;
use App\Models\Property;
use App\Models\SupportTicket;
use Illuminate\Pagination\Paginator;
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
        $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $activeTemplate = activeTemplate();
        $general = GeneralSetting::first();
        $viewShare['general'] = $general;
        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['pages'] = Page::where('tempname',$activeTemplate)->where('slug','!=','home')->get();
        view()->share($viewShare);

        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'pending_property_count' => Property::where('status', 0)->count(),
                'pending_ticket_count' => SupportTicket::whereIN('status', [0,2])->count(),
            ]);
        });
        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });
        if($general->force_ssl){
            \URL::forceScheme('https');
        }
        Paginator::useBootstrap();
        
    }
}
