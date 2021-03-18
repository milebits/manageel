<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\PackageFeature;
use App\Models\PanelTheme;
use App\Models\Setting;
use App\Models\User;
use App\Policies\PackageFeaturePolicy;
use App\Policies\PackagePolicy;
use App\Policies\PanelThemePolicy;
use App\Policies\SettingPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Package::class => PackagePolicy::class,
        Setting::class => SettingPolicy::class,
        PackageFeature::class => PackageFeaturePolicy::class,
        PanelTheme::class => PanelThemePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
