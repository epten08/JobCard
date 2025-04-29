<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\JobCardRepositoryInterface;
use App\Repositories\JobCardRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobCardRepositoryInterface::class, JobCardRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
