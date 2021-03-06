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
use Illuminate\Http\Request;

class UpdateProfileImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this -> data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle(Request $request)
    {
        $user =  User::findOrFail(Auth::id());

        $user -> user_profile_image = $request -> user_profile_image -> store("users_profile_images");

        $user -> save();

        return redirect("edit");
    }
}