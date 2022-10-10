<?php

namespace App\Jobs;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdminEmailVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Admin $admin;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        //
    }
}
