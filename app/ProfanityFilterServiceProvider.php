<?php

namespace Askedio\ProfanityFilter;

use Illuminate\Support\ServiceProvider;

class ProfanityFilterServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../resources/config/profanity.php'), 'profanity');

        $this->app->singleton('profanity-filter', function () {
            return new ProfanityFilter(config('profanity'), trans('ProfanityFilter::profanity'));
        });
    }

    /**
     * Register routes, translations, views and publishers.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'ProfanityFilter');

        $this->publishes([
          realpath(__DIR__.'/../resources/config/profanity.php') => config_path('profanity.php'),
          realpath(__DIR__.'/../resources/lang') => resource_path('lang/vendor/profanity'),
        ], 'config');
    }
}
