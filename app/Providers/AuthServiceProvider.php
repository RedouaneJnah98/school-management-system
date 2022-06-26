<?php

namespace App\Providers;

use App\Models\Teacher;
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
//        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Teacher::class => TeacherPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Only Admin can add or edit or delete a teacher account
//        Gate::define('add_teacher', fn(Teacher $teacher) => $teacher->status === 'admin');
//        Gate::define('edit_teacher', fn(Teacher $teacher) => $teacher->status === 'admin');
//        Gate::define('delete_teacher', fn(Teacher $teacher) => $teacher->status === 'admin');
    }
}
