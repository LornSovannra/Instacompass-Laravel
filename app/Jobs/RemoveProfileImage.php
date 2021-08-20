<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RemoveProfileImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($data)
    {
        $this -> $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        $user = User::findOrFail(Auth::id());

        $user -> user_profile_image = "users_profile_images/default_profile_image.png";

        $user -> save();

        return redirect("edit");
    }
}