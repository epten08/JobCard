<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\JobCard;
use App\Policies\JobCardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JobCard::class => JobCardPolicy::class,
        // Add more model-policy mappings here if needed
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // You can define additional Gates here if needed.
        // Example:
        // Gate::define('admin-only', function ($user) {
        //     return $user->role === 'admin';
        // });
    }
}
