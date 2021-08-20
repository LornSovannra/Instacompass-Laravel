<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UpdateProfile(Request $request)
    {
        $request -> validate([
            "user_name" => "required | min: 2",
            "user_bio" => "required | min:2",
            "user_phone_number" => "required | min: 9",
            "user_gender" => "required | min:4"
        ]);

        $user_id = Auth::id();
        $user =  User::findOrFail($user_id);

        $user -> name = $request -> user_name;
        $user -> user_bio = $request -> user_bio;
        $user -> user_phone_number = $request -> user_phone_number;
        $user -> user_gender = $request -> user_gender;

        $user -> save();

        return redirect("edit");
    }

    public function UpdateProfileImage(Request $request)
    {
        $user =  User::findOrFail(Auth::id());

        $user -> user_profile_image = $request -> user_profile_image -> store("users_profile_images");

        $user -> save();

        return redirect("edit") -> with("message", "Profile Update");
    }

    /* public function RemoveProfileImage(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user -> user_profile_image = "users_profile_images/default_profile_image.png";

        $user -> save();

        return redirect("edit") -> with("message", "Profile Remove");
    } */

    /* public function UserPostProfile($name)
    {
        $user = User::findOrFail($name);
        $auth = Auth::user();

        return view("user-post-profile", ['user' => $user, "auth" => $auth]);
    } */

    public function findAction(\Illuminate\Http\Request $request) {
        if ($request->has('update.profile.image')) {
            return $this->dispatch(new \App\Jobs\UpdateProfileImage($request));
        } else if ($request->has('remove.profile.image')) {
            return $this->dispatch(new \App\Jobs\RemoveProfileImage($request));
        }
        return 'no action found';
    }
}