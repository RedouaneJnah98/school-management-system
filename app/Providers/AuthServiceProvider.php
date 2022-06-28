<?php

namespace App\Providers;

use App\Models\Parents;
use App\Models\Teacher;
use App\Policies\ParentsPolicy;
use App\Policies\TeacherPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Teacher::class => TeacherPolicy::class,
        Parents::class => ParentsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Verify if Teacher account is Admin
        Gate::define('trashed', function (Teacher $teacher) {
            return $teacher->status === 'admin';
        });
    }
}
